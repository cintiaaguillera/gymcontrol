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
                    @submit.prevent="submitForm"
                    method="POST"
                    @keydown="clearError($event.target.name)"
                    v-bind:id="idformcadastro"
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
                        <div class="form-group col-md-6">
                            <label class="small mb-1" for="cpf">CPF</label>
                            <input
                                type="text"
                                class="form-control py-4"
                                id="cpf"
                                name="cpf"
                                v-model="cpf"
                                v-mask="'###.###.###-##'"
                                placeholder="CPF"
                                :class="hasError('cpf') ? 'is-invalid' : ''"
                            />

                            <span
                                class="invalid-feedback"
                                v-if="hasError('cpf')"
                                v-text="getError('cpf')"
                            ></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="small mb-1" for="rg">RG</label>
                            <input
                                type="text"
                                class="form-control py-4"
                                id="rg"
                                name="rg"
                                v-model="rg"
                                v-mask="'##.###.###-#'"
                                placeholder="RG"
                                 :class="hasError('rg') ? 'is-invalid' : ''"
                            />

                            <span
                                class="invalid-feedback"
                                v-if="hasError('rg')"
                                v-text="getError('rg')"
                            ></span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="small mb-1" for="tipoaula"
                                >Titpo aula</label
                            >
                            <select
                                id="tipoaula"
                                name="tipoaula"
                                v-model="tipoaula"
                                @change="clearError('tipoaula')"
                                class="custom-select custom-select-lg my-select-height"
                                :class="hasError('tipoaula') ? 'is-invalid' : ''"
                            >
                                <option disabled selected value="0">Escolha um tipo de aula</option>
                                <option v-for="(aula, key) in aulas" :key="key" :value="aula.id_aula">{{ aula.nome }}</option>
                            </select>
                            <span
                                class="invalid-feedback"
                                v-if="hasError('tipoaula')"
                                v-text="getError('tipoaula')"
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
    props: ["titulo", "idformcadastro", "aulas", "token"],

    mounted() {
        console.log("componente de cadastro de clientes.");
    },

    data() {
        return {
            nome: "",
            cpf: "",
            rg: "",
            tipoaula: 0,

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
                .post("/admin/funcionario/instrutor/salvar/", {
                    nome: this.nome,
                    cpf: this.cpf,
                    rg: this.rg,
                    tipoaula: this.tipoaula
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

        clearMsgErros() {
            this.errorMessage = {};
            this.errors = {};
        },

        clearMsgSucess() {
            this.successMessage = {};
        },

        limparForm() {
            document.getElementById("form-cadastro-instrutor").reset();
            document.getElementById("tipoaula").selectedIndex = "0";
            this.nome = "";
            this.cpf = "";
            this.rg = "";
            this.tipoaula = 0;
        },

        limpaAllMsg() {
            this.clearMsgErros();
            this.clearMsgSucess();
        },

        getError(field) {
            if (this.erros[field]) {
                return this.erros[field][0];
            }
        },

        recordErros(erros) {
            if (erros.response != undefined || erros.response != null)
                    this.erros = erros.response.data.errors;
        },

        clearError(field) {
           if(this.erros != undefined || this.erros !=  null)
                    delete this.erros[field];
        },

        hasError(field) {
            if(this.erros != undefined || this.erros !=  null)
                return this.erros.hasOwnProperty(field);
        },

        onSuccess(response) {
           this.resetForm();
           this.successMessage = response.data;
        },

        onError(response) {
           if (response != undefined || response != null)
                this.errorMessage = response;
        },

        resetForm() {
            this.limparForm();
            this.limpaAllMsg();
        }
    }
};
</script>
