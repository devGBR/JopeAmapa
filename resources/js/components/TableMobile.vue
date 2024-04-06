<template>
<section class="w-100 overflow-y-auto" style="max-height: 400px !important;">
    <v-card class="w-100 my-2 text-white" color="#5dc68a" v-for="item in tarefas">
        <v-card-title class="px-5">{{ item.tarefa }}</v-card-title>
        <section  class="w-100 overflow-y-auto py-2 d-flex flex-wrap px-1">
            <div class="w-50">
                <div class="text-truncate d-flex align-baseline justify-center flex-wrap"><v-icon
                        icon="mdi-account-group" start></v-icon>Departamento</div>
                <div class="text-center mt-1 pl-6">
                    <p>Instrumental</p>
                </div>
            </div>
            <div class="w-50">
                <div class="text-truncate d-flex align-baseline justify-center flex-wrap"><v-icon icon="mdi-list-status"
                        start></v-icon>Status</div>
                <div class="text-center mt-1 pl-6">
                    <v-chip class="ma-2"
                        :color="item.status === 'Completo' ? 'light-green-accent-3' : item.status === 'Em andamento' ? 'orange-accent-3' : 'blue-grey-darken-2'"
                        text-color="white">
                        {{ item.status }}
                    </v-chip>
                </div>
            </div>
            <div class="w-50">
                <div class="text-truncate d-flex align-baseline justify-center flex-wrap"><v-icon
                        icon="mdi-account-group" start></v-icon>Departamento</div>
                <div class="text-center mt-1 pl-6">
                    <p>Instrumental</p>
                </div>
            </div>
            <div class="w-50">
                <div class="text-truncate d-flex align-baseline justify-center flex-wrap"><v-icon icon="mdi-list-status"
                        start></v-icon>Status</div>
                <div class="text-center mt-1 pl-6">
                    <v-chip class="ma-2"
                        :color="item.status === 'Completo' ? 'light-green-accent-3' : item.status === 'Em andamento' ? 'orange-accent-3' : 'blue-grey-darken-2'"
                        text-color="white">
                        {{ item.status }}
                    </v-chip>
                </div>
            </div>
        </section>
    </v-card>
</section>

</template>

<script>

export default {
    props: {
        equipes: Array,
        tarefas: Array,
    },
    data: () => {

    }
}

</script>

<style scoped></style>