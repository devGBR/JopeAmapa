<template>
    <layout :colorBar="Bar" :movel="mobile" :elevacao="5" :class="!mobile ? 'mt-16' : ''" :Logo="logo">
        <section class="w-100 mt-5" :style="`max-width: ${larguraHome}px;`">
            <v-row>
                <v-col cols="12" class="" md="8">
                    <v-row class="w-100 h-75 py-1">
                        <v-col cols="12" class="py-5" md="6">
                            <v-card title="" class="w-100 mx-3 text-white" :height="'270'"
                                :style="`background: url('${random}')  center no-repeat; position: relative; font-weight: 800;`">
                                <div class="w-100 h-100 d-flex flex-column py-8 justify-center"
                                    style="background: transparent; backdrop-filter: blur(5px); position: absolute; top: 0;">
                                    <v-card-title class="text-center mb-2">
                                        Versículo do dia
                                    </v-card-title>
                                    <div class="d-flex">
                                        <v-card-title class="w-50 mb-1 mx-5" style="text-shadow: 0 0 0.2em #000;">
                                            Lívro
                                            <v-card-subtitle class="text-green"
                                                style="font-weight: 800 !important; text-shadow: rgb(11 98 29) 0px 0px 0.2em;">
                                                {{ $page.props.verse_day.livro }}
                                                {{ $page.props.verse_day.captulo }}:{{ $page.props.verse_day.versiculo
                                                }}
                                            </v-card-subtitle>
                                        </v-card-title>
                                        <v-card-title class="w-50 mx-5" style="text-shadow: 0 0 0.2em #000;">
                                            Autor
                                            <v-card-subtitle class="text-green"
                                                style="font-weight: 800 !important; text-shadow: rgb(11 98 29) 0px 0px 0.2em;">
                                                {{ $page.props.verse_day.author }}
                                            </v-card-subtitle>
                                        </v-card-title>
                                    </div>

                                    <v-card-text class="w-100 px-12 mx-auto text-justify"
                                        style="font-weight: 800; text-shadow: 0 0 0.2em #000">
                                        {{ $page.props.verse_day.text }}
                                    </v-card-text>
                                </div>

                            </v-card>
                        </v-col>
                        <v-col cols="12" class="py-5" md="6">
                            <v-card :height="'270'" class="w-100  mx-3" v-if="$page.props.event" style="position: relative;">
                                <div class="w-100 pa-3 text-center bg-green d-flex  justify-center"
                                    style="position: absolute; top: 0; left: 0;">
                                    Proximo Evento JOPE
                                </div>
                                <v-img :src="$page.props.event.banner" class="w-100 h-50 mt-11" cover></v-img>

                                <v-list-item class="" :subtitle="$page.props.event.descricao">
                                    <template v-slot:title>
                                        <strong class="text-h6 mb-2">{{ $page.props.event.evento }}</strong>
                                    </template>
                                </v-list-item>

                                <div class="d-flex justify-space-between px-4">
                                    <div class="d-flex align-center  text-medium-emphasis me-1">
                                        <v-icon icon="mdi-clock" start></v-icon>

                                        <div class="text-truncate">{{ $page.props.event.horario }}</div>

                                    </div>
                                    <div class="d-flex align-center  text-medium-emphasis me-1">
                                        <v-icon icon="mdi-calendar-multiselect" start></v-icon>

                                        <div class="text-truncate">{{ formatData($page.props.event.data) }}</div>

                                    </div>
                                </div>
                            </v-card>
                            <v-card :height="'270'" class="w-100 d-flex align-center justify-center mx-3" v-else style="position: relative;">
                                <div class="w-100 pa-3 text-center bg-green d-flex  justify-center"
                                    style="position: absolute; top: 0; left: 0;">
                                    Proximo Evento JOPE
                                </div>
                                    <div class="mt-11 text-center">Nenhum Evento programado</div>
                            </v-card>
                        </v-col>

                        <v-col cols="12" :class="!mobile ? 'pb-10' : ''">
                            <v-card title="Proximas tarefas" class="w-100 mx-3">
                                <div class="w-100 h-100 px-5">
                                    <DataTable />
                                </div>

                            </v-card>

                        </v-col>
                    </v-row>
                </v-col>
                <v-col cols="12" class="d-flex justify-center px-5" md="4">

                    <v-row class="w-100 h-100  py-3">
                        <v-col cols="12" class="">
                            <v-card class="w-100 h-100 text-center pa-3 h-100" style="position: relative;">
                                <div class="w-100 pa-3 text-center bg-green d-flex  justify-center"
                                    style="position: absolute; top: 0; left: 0;">
                                    JOPER
                                    <v-btn icon size="small" style="position: absolute; right: 10px; top: 10%;">
                                        <v-tooltip activator="parent" location="bottom">Editar cadastro</v-tooltip>
                                        <v-icon>mdi-pencil</v-icon>
                                    </v-btn>
                                </div>
                                <div class="w-100 h-100 d-flex flex-column py-16 justify-center align-center">
                                    <v-avatar image="img/IconBranca.png" class="bg-green"
                                        style="box-shadow: gray 0px 4px 6px 0px;" size="200"></v-avatar>
                                    <p class="text-center pa-5">{{ $page.props.user.nome }}</p>
                                    <div class="w-100 ">
                                        <v-row>
                                            <v-col cols="12" md="6">
                                                <v-card-title>
                                                    Username
                                                    <p class="text-subtitle-1" style="font-weight: 800 !important;">
                                                        {{ $page.props.user.username }}
                                                    </p>
                                                </v-card-title>
                                            </v-col>
                                            <v-col cols="12" md="6">
                                                <v-card-title>
                                                    Insígnias
                                                    <p class="text-white text-center"
                                                        style="font-weight: 800 !important;">
                                                        <v-chip v-for="cargo in $page.props.cargos"  :color="cargo === 'joper' ? 'green' : 
                                                                            cargo === 'mídia' ? 'blue': 
                                                                            cargo === 'instrumental' ? 'red': 
                                                                            cargo === 'louvor' ? 'aqua':
                                                                            cargo === 'dança' ? 'orange' :
                                                                            cargo === 'teatro' ? 'yellow' :
                                                                            cargo === 'dinamica' ? 'grey' :
                                                                            cargo === 'lider' ? 'black' :
                                                                            null">
                                                            <v-icon :icon="cargo === 'joper' ? 'mdi-alien' : 
                                                                            cargo === 'mídia' ? 'mdi-camera-iris': 
                                                                            cargo === 'instrumental' ? 'mdi-music': 
                                                                            cargo === 'louvor' ? 'mdi-microphone-variant':
                                                                            cargo === 'dança' ? 'mdi-human-female-dance' :
                                                                            cargo === 'teatro' ? 'mdi-drama-masks' :
                                                                            cargo === 'dinamica' ? 'mdi-puzzle' : 
                                                                            cargo === 'lider' ? 'mdi-brain' :
                                                                            null"></v-icon>
                                                            <v-tooltip
                                                                activator="parent"
                                                                location="top"
                                                                class="text-uppercase"
                                                            >{{ cargo }}</v-tooltip>            
                                                        </v-chip>
                                                    </p>
                                                </v-card-title>
                                            </v-col>
                                            <v-col cols="12" md="6">
                                                <v-card-title>
                                                    Nascimento
                                                    <p class="text-subtitle-1" style="font-weight: 800 !important;">
                                                        {{ formatData($page.props.user.data_nascimento) }}
                                                    </p>
                                                </v-card-title>
                                            </v-col>
                                            <v-col cols="12" md="6">
                                                <v-card-title>
                                                    Genero
                                                    <p class="text-subtitle-1" style="font-weight: 800 !important;">
                                                        {{ $page.props.user.genero }}
                                                    </p>
                                                </v-card-title>
                                            </v-col>
                                            <v-col cols="12" md="6">
                                                <v-card-title>
                                                    Endereço
                                                    <p class="text-subtitle-1" style="font-weight: 800 !important;">
                                                        {{ $page.props.user.endereco }}, {{ $page.props.user.numero }}
                                                    </p>
                                                </v-card-title>
                                            </v-col>
                                            <v-col cols="12" md="6">
                                                <v-card-title>
                                                    Bairro
                                                    <p class="text-subtitle-1" style="font-weight: 800 !important;">
                                                        {{ $page.props.user.bairro }}
                                                    </p>
                                                </v-card-title>
                                            </v-col>
                                        </v-row>
                                    </div>
                                </div>



                            </v-card>
                        </v-col>
                    </v-row>
                </v-col>
            </v-row>


        </section>
    </layout>
</template>
<script>
import Layout from '../Layout/Layout.vue';
import DataTable from '../components/DataTable.vue';
import axios from 'axios';
export default {
    components: {
        Layout,
        DataTable
    },
    data() {
        return {
            Bar: '#284703',
            logo: '/img/IconBranca.png',
            mobile: false,
            larguraHome: null,
            page: 1,
            random: 'https://cdn.pixabay.com/photo/2024/03/09/14/46/tomb-8622722_640.jpg',
            items: Array.from({ length: 15 }, (k, v) => ({
                title: 'Item ' + v + 1,
                text: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi, ratione debitis quis est labore voluptatibus! Eaque cupiditate minima, at placeat totam, magni doloremque veniam neque porro libero rerum unde voluptatem!',
            })),


        }
    },
    mounted() {
        let imgs = {
            '0': 'https://cdn.pixabay.com/photo/2024/03/09/14/46/tomb-8622722_640.jpg',
            '1': 'https://cdn.pixabay.com/photo/2024/02/09/20/08/tomb-8563707_640.jpg',
            '2': 'https://media.istockphoto.com/id/1360520573/pt/foto/christian-group-of-people-holding-hands-praying-worship-to-believe-and-bible-on-a-wooden-table.jpg?s=612x612&w=0&k=20&c=fe6rfBq2xGKYrDpJKqTen6jPk16yHH4P9SB-KOEQheU=',
            '3': 'https://media.istockphoto.com/id/1323531227/pt/foto/christian-prayer-group-with-bible-by-playing-the-guitar-to-worship-god.jpg?s=2048x2048&w=is&k=20&c=IkVnp1Rx6s0tYku5-A1SArmureeVRclSbvPbmF6hRDI=',
            '4': 'https://media.istockphoto.com/id/165888125/pt/foto/abra-a-b%C3%ADblia-com-fundo-de-ouro.jpg?s=612x612&w=0&k=20&c=W4SMXMmJQU2nanJYCJQdGXLNJNEIQBIvGH1iz2iW4KU=',
            '5': 'https://media.istockphoto.com/id/1290401675/pt/foto/good-friday-passion-of-jesus-christ-crown-of-thorns-hammer-bloody-nails-on-ground-christian.jpg?s=612x612&w=0&k=20&c=Mmcvvgigow5L8q5RGzJn-G_S2HPZ8eK5IOpIaj90J1U=',
            '6': 'https://media.istockphoto.com/id/1439505344/pt/foto/the-guiding-star.jpg?s=612x612&w=0&k=20&c=3HDLVnUs4vkJuVZW1wsWAAMXRgTE8m3IJZh7N22OlXA=',
            '7': 'https://media.istockphoto.com/id/525041000/pt/foto/brilhante-esperan%C3%A7a-de-vida.jpg?s=612x612&w=0&k=20&c=O7ZS9VtX1bhI2LHoJg93HbilJ7Y5jlWznxefK6BwFhE=',
        }
        let verseImg = this.$page.props.verse_day.img;

        this.random = imgs[verseImg] || '';

        this.larguraHome = window.innerWidth;
        if (this.larguraHome < 501) {
            this.Bar = '#284703';
            this.logo = '/img/IconBranca.png'
            this.mobile = true;
        }


    },
    methods: {
        formatData(data) {
            return data.split('-').reverse().join('/')
        }
    }
}
</script>
