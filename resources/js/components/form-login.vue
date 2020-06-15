<template>

    <form
        class="needs-validation"
        @submit.prevent="submitForm"
        method="POST"
        @keydown="clearError($event.target.name)"
        v-bind:id="idformlogin"
    >
        <messages titulo="Parabéns! " :message="this.successMessage.message" tipo="success"></messages>

        <messages titulo="Erro! " :message="this.errorMessage.errormessage" tipo="error"></messages>

        <div class="form-group">
            <input type="hidden" name="_token" v-bind:value="token" />
            <label class="small mb-1" for="inputEmailAddress">Email</label
            ><input
                class="form-control py-4"
                id="inputEmailAddress"
                type="email"
                placeholder="Endereço de email"
                v-model="email"
                name="email"
                :class="hasError('email') ? 'is-invalid' : ''"
            />
            <span
                class="invalid-feedback"
                v-if="hasError('email')"
                v-text="getError('email')"
            ></span>
        </div>
        <div class="form-group">
            <label class="small mb-1" for="senha">Senha</label
            ><input
                class="form-control py-4"
                id="senha"
                type="password"
                name="senha"
                v-model="senha"
                placeholder="Senha"
                :class="hasError('senha') ? 'is-invalid' : ''"
            />
            <span
                class="invalid-feedback"
                v-if="hasError('senha')"
                v-text="getError('senha')"
            ></span>
        </div>
        <!-- <div class="form-group">
            <div class="custom-control custom-checkbox">
                <input
                    class="custom-control-input"
                    id="rememberPasswordCheck"
                    type="checkbox"
                /><label
                    class="custom-control-label"
                    for="rememberPasswordCheck"
                    >Lembrar da senha</label
                >
            </div>
        </div> -->
        <div
            class="form-group d-flex align-items-center justify-content-between mt-4 mb-0"
        >
            <a class="small" :href="'/'">Esqueceu sua senha?</a>
            <!-- <a class="btn btn-primary" href="index.html">Login</a> -->
            <button
                v-bind:form="idformlogin"
                type="submit"
                class="btn btn-primary">
                LOGIN
            </button>
        </div>
    </form>
</template>

<script>


export default {
    props: ["idformlogin", "token"],

    mounted() {
        console.log("componente de cadastro de clientes.");
    },

    data() {
        return {
            email: "",
            senha: "",
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
                .post("/autenticar", {
                    email: this.email,
                    senha: this.senha
                })
                .then(function(response) {
                    //uma das formas de redirecionar com ajax
                    window.location.reload();
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
            document.getElementById("form-login").reset();
            this.email = "";
            this.senha = "";
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
            if (erros != undefined || erros != null)
                this.erros = erros.response.data.errors;
        },

        clearError(field) {
            if (this.erros != undefined || this.erros != null)
                delete this.erros[field];
        },

        hasError(field) {
            if (this.erros != undefined || this.erros != null)
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
