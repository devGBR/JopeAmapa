<template>
    <Layout :colorBar="Bar" :movel="mobile" :elevacao="5" :class="!mobile ? 'mt-16' : ''" :Logo="logo">
        <section class="">
            <div class="px-16 my-5">
                <div class="d-flex">
                    <v-toolbar class="px-2 d-flex text-end" color="transparent" style="z-index: 5;">
                        <v-text-field v-model="search" clearable density="comfortable" hide-details
                            placeholder="Pequisar" prepend-inner-icon="mdi-magnify" style="max-width: 300px;"
                            variant="solo"></v-text-field>
                        <v-btn color="green" class="ml-auto" v-if="model === 'ver'" prepend-icon="mdi-plus"
                            @click=" model = 'criar'" variant="outlined">Criar
                            Evento</v-btn>
                        <v-btn color="green" class="ml-auto" v-else prepend-icon="mdi-arrow-left"
                            @click=" model = 'ver'" variant="outlined">Voltar</v-btn>
                    </v-toolbar>

                </div>
                <v-window v-model="model">
                    <v-window-item value="ver">
                        <v-card class="mx-auto w-100 text-white pa-5 pr-0 " color="#3e6d0687">
                            <div class="d-flex">
                                <v-img height="180px" class="w-25 rounded"
                                    src="https://cdn.vuetifyjs.com/images/cards/sunshine.jpg" cover></v-img>

                                <v-card-title class="w-75 py-5 px-8 d-flex flex-column flex-wrap justify-space-between">
                                    <div class="w-100 d-flex">
                                        <div class="w-75">
                                            Top western road trips
                                            <v-card-subtitle>
                                                1,000 miles of wonder
                                            </v-card-subtitle>
                                        </div>
                                        <div class="w-25 text-end">

                                            <v-btn prepend-icon="mdi-delete" class="" color="red">
                                                Excluir
                                            </v-btn>
                                        </div>
                                    </div>
                                    <div>

                                    </div>
                                    <div class="d-flex">
                                        <div class="d-flex align-center w-50   me-1 justify-space-between"
                                            style="padding: 0px 190px 0px 0px;">
                                            <div class="d-flex align-center">
                                                <v-icon icon="mdi-clock" start></v-icon>

                                                <div class="text-truncate">Horario</div>
                                            </div>
                                            <div class="d-flex align-center">
                                                <v-icon icon="mdi-calendar-multiselect" start></v-icon>
                                                <div class="text-truncate">Data</div>
                                            </div>
                                        </div>
                                        <v-card-actions class="w-50 text-end" style="position: relative;">
                                            <v-spacer></v-spacer>
                                            <v-btn :icon="show ? 'mdi-chevron-up' : 'mdi-chevron-down'"
                                                @click="show = !show"
                                                style="position: absolute; bottom: -20px; right: 0px;"></v-btn>
                                        </v-card-actions>
                                    </div>

                                </v-card-title>
                            </div>

                            <v-expand-transition class="mt-5">
                                <div v-show="show">
                                    <v-divider></v-divider>

                                    <v-card-text>
                                        I'm a thing. But, like most politicians, he promised more than he could deliver.
                                        You
                                        won't have time for sleeping, soldier, not with all the bed making you'll be
                                        doing. Then
                                        we'll go with that data file! Hey, you add a one and two zeros to that or we
                                        walk!
                                        You're going to do his laundry? I've got to find a way to escape.
                                    </v-card-text>
                                </div>
                            </v-expand-transition>
                        </v-card>
                    </v-window-item>

                    <v-window-item value="criar">
                        <v-card class="w-100 h-100 pa-8 my-5">
                            <form @submit.prevent="createEvent">
                                <v-text-field label="Nome do Evento" v-model="nome" color="#3e6d0687"
                                    variant="outlined"></v-text-field>
                                <v-text-field label="Data do Evento" v-model="data" color="#3e6d0687" type="date"
                                    variant="outlined"> </v-text-field>
                                <v-text-field label="Horario do Evento" v-model="horario" type="time" color="#3e6d0687"
                                    variant="outlined"></v-text-field>
                                <v-textarea label="Descrição do Evento" v-model="descricao" color="#3e6d0687"
                                    variant="outlined"></v-textarea>
                                <v-file-input label="Flyer do Evento" v-model="banner" color="#3e6d0687"
                                    prepend-icon="mdi-camera" variant="outlined"></v-file-input>
                                <v-btn class="me-4" variant="outlined" color="green" append-icon="mdi-send"
                                    type="submit">
                                    Criar
                                </v-btn>
                            </form>
                        </v-card>
                    </v-window-item>
                </v-window>


            </div>
        </section>
    </Layout>
</template>

<script>
import axios from 'axios';
import Layout from '../../Layout/Layout.vue'
import { Inertia } from "@inertiajs/inertia"
export default {
    components: {
        Layout,

    },
    data() {
        return {
            Bar: '#284703',
            logo: '/img/IconBranca.png',
            mobile: false,
            show: false,
            model: "ver",
            nome: null,
            data: null,
            horario: null,
            descricao: null,
            banner: null,
        }
    },
    mounted() {
        this.larguraHome = window.innerWidth;
        if (this.larguraHome < 501) {
            this.Bar = '#284703';
            this.logo = '/img/IconBranca.png'
            this.mobile = true;
        }
    },
    methods: {
        createEvent() {
            if (this.nome !== null || this.data !== null || this.horario !== null || this.descricao !== null || this.banner !== null) {
                const data = {
                    nome: this.nome,
                    data: this.data,
                    horario: this.horario,
                    descricao: this.descricao,
                    banner: this.banner,
                }
                Inertia.post('events', data);
            }
        }
    }
}

</script>

<style scoped></style>