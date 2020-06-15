<template>
    <div class="container-fluid">
        <h1 class="mt-4">{{ titulo }}</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">{{ titulo }}</li>
        </ol>

        <!--  <messages titulo="Parabéns! " :message="this.successMessage.message" tipo="success"></messages>

        <messages titulo="Erro! " :message="this.errorMessage.errormessage" tipo="error"></messages> -->

        <div class="card">
            <!-- <div class="card-header"><h3 class="text-center font-weight-light my-4">Cadastrar um cliente</h3></div> -->
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th
                                v-for="titulo in titulos"
                                :key="titulo"
                                scope="col"
                            >
                                {{ titulo }}
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(item, index) in clientes" :key="index">
                            <td>{{ item.id_cliente }}</td>
                            <td>{{ item.nome }}</td>
                            <td>{{ item.cpf }}</td>
                            <td>{{ item.rg }}</td>
                            <td>{{ item.endereco }}</td>
                            <td>{{ item.matricula }}</td>
                            <td>{{ item.plano["0"].nome }}</td>

                            <!-- <td v-for="i in item" :key="i">{{ i }}</td> -->
                            <!--  <td>
                        <form
                            v-bind:id="index"
                            v-if="deletar && token"
                            v-bind:action="deletar"
                            method="post"
                        >
                            <input
                                type="hidden"
                                name="_method"
                                value="DELETE"
                            />
                            <input
                                type="hidden"
                                name="_token"
                                v-bind:value="token"
                            />
                            <a v-bind:href="detalhe">Detalhes</a>
                            |
                            <a href="#" v-on:click="executaForm(index)"
                                >Deletar</a
                            >
                        </form>
                    </td> -->
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ["titulo", "titulos", "clientes", "token"],

    mounted() {
        console.log("componente de gerenciamento de clientes.");
    }
};
</script>
