<template>
    <div class="container-fluid">
        <h1 class="mt-4">{{ titulo }}</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">{{ titulo }}</li>
        </ol>

        <messages titulo="Parabéns! " :message="this.successMessage.message" tipo="success"></messages>

        <messages titulo="Erro! " :message="this.errorMessage.errormessage" tipo="error"></messages>
        

        <div class="card">
           
            <!-- <div class="card-header"><h3 class="text-center font-weight-light my-4">Cadastrar um cliente</h3></div> -->
            <div class="card-body">
                <form
                    class="needs-validation"
                    v-bind:id="idformcadastro"
                    @submit.prevent="submitForm"
                    method="POST"
                    @keydown="clearError($event.target.name)"
                >
                    <input type="hidden" name="_token" v-bind:value="token" />
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label class="small mb-1" for="nome">Nome</label>
                            <input
                                type="text"
                                class="form-control py-4"
                                id="nome"
                                name="nome"
                                v-model="nome"
                                placeholder="Nome"
                                :class="hasError('nome') ? 'is-invalid' : ''"
                            />
                            <span
                                class="invalid-feedback"
                                v-if="hasError('nome')"
                                v-text="getError('nome')"
                            ></span>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label class="small mb-1" for="cpf">CPF</label>
                            <input
                                type="text"
                                class="form-control py-4"
                                :class="hasError('cpf') ? 'is-invalid' : ''"
                                id="cpf"
                                name="cpf"
                                v-model="cpf"
                                v-mask="'###.###.###-##'"
                                placeholder="CPF"
                            />
                            <span
                                class="invalid-feedback"
                                v-if="hasError('cpf')"
                                v-text="getError('cpf')"
                            ></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="small mb-1" for="rg">RG</label>
                            <input
                                type="text"
                                class="form-control py-4"
                                :class="hasError('rg') ? 'is-invalid' : ''"
                                id="rg"
                                name="rg"
                                v-model="rg"
                                v-mask="'##.###.###-#'"
                                placeholder="RG"
                            />
                            <span
                                class="invalid-feedback"
                                v-if="hasError('rg')"
                                v-text="getError('rg')"
                            ></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="small mb-1" for="matricula"
                                >Matricula</label
                            >
                            <input
                                type="number"
                                class="form-control py-4"
                                :class="
                                    hasError('matricula') ? 'is-invalid' : ''
                                "
                                id="matricula"
                                name="matricula"
                                v-model="matricula"
                                placeholder="Matrícula do cliente"
                            />

                            <span
                                class="invalid-feedback"
                                v-if="hasError('matricula')"
                                v-text="getError('matricula')"
                            ></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="endereco"
                            >Endereço</label
                        >
                        <input
                            type="text"
                            class="form-control py-4"
                            :class="hasError('endereco') ? 'is-invalid' : ''"
                            id="endereco"
                            name="endereco"
                            v-model="endereco"
                            placeholder="Endereço"
                        />
                        <span
                            class="invalid-feedback"
                            v-if="hasError('endereco')"
                            v-text="getError('endereco')"
                        ></span>
                    </div>
                    <div class="form-row">
                        <!-- teste class=custom-select custom-select-lg my-select-height -->
                        <div class="form-group col-md-6">
                            <label class="small mb-1" for="plano">Plano</label>
                            <select
                                id="plano"
                                name="plano"
                                v-model="plano"
                                @change="clearError('plano')"
                                class="custom-select custom-select-lg my-select-height"
                                :class="hasError('plano') ? 'is-invalid' : ''">
                                <option disabled selected value="0">Escolha um tipo de plano</option>
                                <option v-for="(plano, key) in planos" :key="key" :value="plano.id_plano">{{plano.nome}}</option>
                            </select>

                            <span
                                class="invalid-feedback"
                                v-if="hasError('plano')"
                                v-text="getError('plano')"
                            ></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="small mb-1" for="vencimento"
                                >Data do Vencimento</label
                            >
                            <input
                                type="date"
                                name="vencimento"
                                id="vencimento"
                                v-model="vencimento"
                                @input="clearError('vencimento')"
                                class="form-control py-4"
                                :class="
                                    hasError('vencimento') ? 'is-invalid' : ''
                                "
                            />
                            <span
                                class="invalid-feedback"
                                v-if="hasError('vencimento')"
                                v-text="getError('vencimento')"
                            ></span>
                        </div>
                    </div>
                    <button
                        v-bind:form="idformcadastro"
                        type="submit"
                        class="btn btn-primary"
                    >
                        Cadastrar
                    </button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ["titulo", "idformcadastro", "planos", "token"],

    mounted() {
        console.log("componente de cadastro de clientes.");
    },

    data() {
        return {
            nome: "",
            cpf: "",
            rg: "",
            matricula: "",
            endereco: "",
            plano: 0,
            vencimento: "",
            erros: {},
            successMessage: {},
            errorMessage: {}
        };
    },

    methods: {
        submitForm() {
            //post no formulário de cadastro
            let form = this;
            //var componente = this.$el;
            axios
                .post("/admin/cliente/salvar/", {
                    nome: this.nome,
                    cpf: this.cpf,
                    rg: this.rg,
                    matricula: this.matricula,
                    endereco: this.endereco,
                    plano: this.plano,
                    vencimento: this.vencimento,
                })
                .then(function(response) {
                    form.onSuccess(response);
                    form.clearMsgErros();
                })
                .catch(function(erro) {
                    form.recordErros(erro);
                    form.onError(erro.response.data);
                    form.clearMsgSucess();
                });
        },

        clearMsgErros(){
            this.errorMessage = {};
            this.errors = {};
        },

        clearMsgSucess(){
            this.successMessage = {};
        },

        limparForm(){
            document.getElementById("form-cadastro-cliente").reset();
            document.getElementById("plano").selectedIndex = "0";
            this.nome = "";
            this.cpf = "";
            this.rg = "";
            this.matricula = "";
            this.endereco = "";
            this.plano = 0;
            this.vencimento = "";
        },

        limpaAllMsg(){
            this.clearMsgErros();
            this.clearMsgSucess();
        },

        getError(field) {
            if (this.erros[field]) {
                return this.erros[field][0];
            }
        },

        recordErros(erros) {
                if(erros != undefined || erros != null)
                    this.erros = erros.response.data.errors;
        },

        clearError(field) {
             if (this.erros != undefined || this.erros != null)
                    delete this.erros[field];
        },

        hasError(field) {
            if(this.erros != undefined || this.erros != null)
                return this.erros.hasOwnProperty(field);
        },

        onSuccess(response) {
            this.resetForm();
            this.successMessage = response.data;
        },

        onError(response){
            if (response != undefined || response != null)
                this.errorMessage = response;
        },

        resetForm(){
            this.limparForm()
            this.limpaAllMsg();
        }
        
    }
};
</script>
