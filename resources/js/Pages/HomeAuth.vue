<template>
    <layout :colorBar="Bar" :movel="mobile" :elevacao="5" class="mt-16" :Logo="logo">
        <section class="h-screen w-100 d-flex mt-5" style="box-sizing: border-box;">
            <v-row class="w-75 h-75 px-8 py-5">
                <v-col cols="12" class="py-5 h-75" md="6">
                    <v-card title="" class="w-100 h-100 pa-2 pt-1 mx-3 text-white"
                        style="background-image: url('https://miro.medium.com/v2/resize:fit:1024/0*M-gLbKqi_XaXK-ux.png');">
                        <div class="w-100 h-100">
                            <v-card-title class="text-center mb-2">
                                Versículo do dia
                            </v-card-title>
                            <div class="d-flex">
                                <v-card-title class="w-50 mb-1 mx-5">
                                    Lívro
                                    <v-card-subtitle>{{ $page.props.verse_day.livro }} {{
        $page.props.verse_day.captulo }}:{{
        $page.props.verse_day.versiculo }}</v-card-subtitle>
                                </v-card-title>
                                <v-card-title class="w-50 mx-5">
                                    Autor
                                    <v-card-subtitle>{{ $page.props.verse_day.author }}</v-card-subtitle>
                                </v-card-title>
                            </div>

                            <v-card-text class="w-100 px-12 mx-auto h-25 text-justify">
                                {{ $page.props.verse_day.text }}
                            </v-card-text>
                        </div>

                    </v-card>
                </v-col>
                <v-col cols="12" class="py-5 h-75" md="6">
                    <v-card title="Proximas tarefas" class="w-100 h-100  mx-3">

                    </v-card>
                </v-col>

                <v-col cols="12" class="py-5">
                    <v-card title="Proximas tarefas" class="w-100 h-100  mx-3">
                        <v-data-iterator :items="items" :page="page">
                            <template v-slot:default="{ items }">
                                <template v-for="(item, i) in items" :key="i">
                                    <v-card v-bind="item.raw"></v-card>

                                    <br>
                                </template>
                            </template>
                        </v-data-iterator>
                    </v-card>
                </v-col>
            </v-row>
            <v-row class="w-25 h-100 px-1 py-3">
                <v-col cols="12" class="">
                    <v-card class="w-100 text-center pa-3 h-100">
                        <v-avatar image="img/IconBranca.png" class="bg-green" style="box-shadow: gray 0px 4px 6px 0px;"
                            size="200"></v-avatar>
                        <p class="text-center pa-5">{{ $page.props.user.nome }}</p>
                        <div>
                            <v-row>
                                <v-col cols="12" md="6">
                                    <v-card-title>
                                        Username
                                        <v-card-subtitle class="text-bold" style="font-weight: 800 !important;">
                                            {{ $page.props.user.username }}
                                        </v-card-subtitle>
                                    </v-card-title>
                                </v-col>
                                <v-col cols="12" md="6">
                                    <v-card-title>
                                        Insígnias
                                        <v-card-subtitle class="text-uppercase text-white"
                                            style="font-weight: 800 !important;">
                                            <v-chip prepend-icon="mdi-alien" color="green">{{ $page.props.user.cargo
                                                }}</v-chip>
                                        </v-card-subtitle>
                                    </v-card-title>
                                </v-col>
                                <v-col cols="12" md="6">
                                    <v-card-title>
                                        Nascimento
                                        <v-card-subtitle style="font-weight: 800 !important;">
                                            {{ $page.props.user.data_nascimento }}
                                        </v-card-subtitle>
                                    </v-card-title>
                                </v-col>
                                <v-col cols="12" md="6">
                                    <v-card-title>
                                        Genero
                                        <v-card-subtitle style="font-weight: 800 !important;">
                                            {{ $page.props.user.genero }}
                                        </v-card-subtitle>
                                    </v-card-title>
                                </v-col>
                                <v-col cols="12" md="6">
                                    <v-card-title>
                                        Endereço
                                        <v-card-subtitle lines="tree" style="font-weight: 800 !important;">
                                            {{ $page.props.user.endereco }}, {{ $page.props.user.numero }}
                                        </v-card-subtitle>
                                    </v-card-title>
                                </v-col>
                                <v-col cols="12" md="6">
                                    <v-card-title>
                                        Bairro
                                        <v-card-subtitle style="font-weight: 800 !important;">
                                            {{ $page.props.user.bairro }}
                                        </v-card-subtitle>
                                    </v-card-title>
                                </v-col>
                            </v-row>
                        </div>


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
            page: 1,
            items: Array.from({ length: 15 }, (k, v) => ({
                title: 'Item ' + v + 1,
                text: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi, ratione debitis quis est labore voluptatibus! Eaque cupiditate minima, at placeat totam, magni doloremque veniam neque porro libero rerum unde voluptatem!',
            })),


        }
    },
    mounted() {
        axios.get('https://www.abibliadigital.com.br/api/verses/nvi/random').then(
            function (response) {
                console.log(response.data)
            }
        )
    }
}
</script>
