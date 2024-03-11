<template>
    <layout :colorBar="Bar" :movel="mobile" :elevacao="5" class="mt-16" :Logo="logo">
        <section class="h-screen w-100 mt-5">
            <v-row class="w-100 h-100 px-10 py-5">
                <v-col cols="12" class="py-5" md="9">
                    <v-card title="Proximas tarefas" class="w-100 h-50  mx-3">

                    </v-card>
                    <v-card title="Proximas tarefas" class="w-100 h-50 my-5 mx-3">

                    </v-card>
                </v-col>
                <v-col cols="12" class="py-5" md="3">
                    <v-card title="Proximas tarefas" class="w-100 h-75  mx-3">

                    </v-card>
                </v-col>
                
            </v-row>

        </section>
    </layout>
</template>
<script>
import Layout from '../Layout/Layout.vue'
import axios from 'axios';
export default {
    components: {
        Layout
    },
    data() {
        return {
            Bar: '#284703',
            logo: '/img/IconBranca.png',
            mobile: false,

        }
    },
    mounted(){
        axios.get('https://www.abibliadigital.com.br/api/verses/nvi/random').then(
            function (response) {
                console.log(response.data)
            }
        )
    }
}
</script>
