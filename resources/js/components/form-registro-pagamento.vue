<template>
    <div class="container-fluid">
        <h1 class="mt-4">{{ titulo }}</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">{{ titulo }}</li>
        </ol>
        <div class="card">
            <!-- <div class="card-header"><h3 class="text-center font-weight-light my-4">Cadastrar um cliente</h3></div> -->
            <div class="card-body">
                <form v-bind:id="idformcadastro" @submit="formSubmit">
                    <div class="form-row align-items-center">
                        <div class="form-group col-md-5 my-1">
                            <label class="small mb-1" for="cpf">CPF</label>
                            <input
                                type="text"
                                class="form-control py-4"
                                id="cpf"
                                v-mask="'###.###.###.##'"
                                placeholder="CPF"
                            />
                        </div>
                        <div class="form-group col-md-5 my-1">
                            <label class="small mb-1" for="matricula"
                                >Matricula</label
                            >
                            <input
                                type="number"
                                class="form-control py-4"
                                id="matricula"
                            />
                        </div>
                        <div class="form-group col-auto my-1">
                            <button
                                v-bind:form="idformcadastro"
                                type="submit"
                                class="btn btn-lg my-btn-search btn-primary mb-2"
                            >
                                Buscar
                            </button>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label class="small mb-1" for="nome">Nome</label>
                            <input
                                type="text"
                                class="form-control py-4"
                                id="nome"
                                placeholder="Nome"
                                readonly
                            />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="small mb-1" for="datavencimento"
                                >Data venvimento</label
                            >
                            <input
                                class="form-control py-4"
                                type="date"
                                id="datavencimento"
                                placeholder="Data vencimento"
                                readonly
                            />
                        </div>
                        <div class="form-group col-md-6">
                            <label class="small mb-1" for="plano">Plano</label>
                            <input
                                type="text"
                                class="form-control py-4"
                                id="plano"
                                placeholder="plano"
                                readonly
                            />
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="small mb-1" for="datapagamento"
                                >Data do pagamento</label
                            >
                            <input
                                class="form-control py-4"
                                type="date"
                                id="datapagamento"
                                placeholder="Data pagamento"
                            />
                        </div>
                        <div class="form-group col-md-6">
                            <label class="small mb-1" for="valorpagamento"
                                >Valor do pagamento</label
                            >
                            <input
                                type="number"
                                v-mask="['####.##', '##.##']"
                                class="form-control py-4"
                                id="valorpagamento"
                                placeholder="Valor do pagamento"
                            />
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="small mb-1" for="proxpagamento"
                                >Data prox. pagamento</label
                            >
                            <input
                                class="form-control py-4"
                                type="date"
                                id="proxpagamento"
                                placeholder="Data próximo pagamento"
                            />
                        </div>
                        <div class="form-group col-md-6">
                            <label class="small mb-1" for="plano"
                                >Forma de pagamento</label
                            >
                            <select
                                class="custom-select custom-select-lg my-select-height"
                            >
                                <option selected
                                    >Escolha um tipo de pagamento</option
                                >
                                <option value="1">DINHEIRO</option>
                                <option value="1">DÉBITO</option>
                                <option value="1">CRÉDITO</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                         <div class="custom-control custom-switch">
                            <input
                                type="checkbox"
                                class="custom-control-input"
                                id="contratovigencia"
                            />
                            <label
                                class="custom-control-label"
                                for="contratovigencia"
                                >Vigência do contrato</label
                            >
                        </div>
                        </div>
                    </div>
                    <button
                        v-bind:form="idformcadastro"
                        type="submit"
                        class="btn btn-lg btn-primary"
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
    props: ["titulo", "idformcadastro"],

    mounted() {
        console.log("componente de cadastro de clientes.");
    },

    methods: {
        formSubmit(e) {
            e.preventDefault();
            let formcadastrocard = this;
            var componente = this.$el;

            //post no formulário de cadastro
            axios
                .post("/admin/cliente/salvar/", {
                    titulo: this.titulo,
                    descricao: this.descricao,
                    imagem: this.imagem,
                    texto: this.texto
                })
                .then(function(response) {
                    console.log(formcadastrocard);
                })
                .catch(function(error) {
                    console.log(error);
                });
        }
    }
};
</script>
