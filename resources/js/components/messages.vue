<template>
    <div v-if="message" class="alert alert-dismissible fade show" :class="tipo == 'success' ? 'alert-success': 'alert-danger'" role="alert">
        <strong>{{titulo}}</strong> {{message}}
        <button
            type="button"
            class="close"
            data-dismiss="alert"
            aria-label="Close"
        >
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</template>
<script>
export default {
    props: ["titulo", "message", "tipo"],

    mounted() {
        console.log("componente de cadastro de clientes.");
    },

};
</script>
