<template>
    <v-app>
        <v-layout style="background-color: #FAFAFA; z-index: 5 !important;">
            <v-app-bar :color="colorBar" style="z-index: 20 !important; position: fixed;" :elevation="elevacao">
                <template v-if="$page.props.logger === true" v-slot:prepend>
                    <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
                </template>

                <v-app-bar-title><img :src="Logo" alt="" style="width:120px; height: 40px;"></v-app-bar-title>

                <template v-slot:append>
                    <div v-if="$page.props.logger === true" class="w-100 d-flex align-center">
                        <v-btn icon="mdi-location-exit" href="/sair" v-if="movel === false" class="mx-2"
                            size="x-large"></v-btn>

                        <div class="d-flex align-center px-auto"
                            style="width: 130px; height: 50px; border-radius: 8px; background-color: white;">
                            <span class="px-2 text-black mx-auto" style="font-size: 20px; font-weight: 600;">{{
                username }}</span>
                        </div>
                    </div>
                    <div v-else>
                        <v-btn href="/login" :class="colorBar === 'transparent' ? 'bg-green' : 'bg-white'">Login</v-btn>
                    </div>

                </template>
            </v-app-bar>
            <v-navigation-drawer v-model="drawer"
                :style="colorBar === 'transparent' ? 'position: fixed; top: 0px; height:110%;' : 'position: fixed;'"
                temporary>

                <v-divider></v-divider>

                <v-list density="compact" nav>
                    
                    <v-menu location="end" transition="scale-transition">
                        <template v-slot:activator="{ props }">
                            <v-list density="compact" nav>
                                <v-list-item prepend-icon="mdi-home" title="Home" href="/" value="home"></v-list-item>
                                <v-list-item prepend-icon="mdi-sitemap-outline" title="Ministérios" subtitle="EM BREVE" disabled value="Ministerio"
                                      dark v-bind="props">
                                </v-list-item>
                                <v-list-item prepend-icon="mdi-calendar-multiple" href="/events" title="Eventos" value="ministerio"></v-list-item>
                                <v-list-item prepend-icon="mdi-format-list-checkbox" href="/tarefas" title="Tarefas" value="tarefas"></v-list-item>
                                <v-list-item prepend-icon="mdi-monitor-dashboard" title="Dashboard" value="dashboard"></v-list-item>
                            </v-list>
                        </template>

                        <v-list density="compact" nav>
                            <v-list-item v-if="$page.props.cargos.includes('instrumental') || $page.props.cargos.includes('lider')" prepend-icon="mdi-music" title="Instrumental" value="ministerio"></v-list-item>
                            <v-list-item v-if="$page.props.cargos.includes('louvor') || $page.props.cargos.includes('lider')" prepend-icon="mdi-microphone-variant" title="Louvor" value="ministerio"></v-list-item>
                            <v-list-item v-if="$page.props.cargos.includes('dança') || $page.props.cargos.includes('lider')" prepend-icon="mdi-human-female-dance" title="Dança" value="ministerio"></v-list-item>
                            <v-list-item v-if="$page.props.cargos.includes('teatro') || $page.props.cargos.includes('lider')" prepend-icon="mdi-drama-masks" title="Teatro" value="ministerio"></v-list-item>
                            <v-list-item v-if="$page.props.cargos.includes('dinamica') || $page.props.cargos.includes('lider')" prepend-icon="mdi-puzzle" title="Dinamica" value="ministerio"></v-list-item>
                            <v-list-item v-if="$page.props.cargos.includes('mídia') || $page.props.cargos.includes('lider')" prepend-icon="mdi-camera-iris" title="Midia - Audiovisual" value="ministerio"></v-list-item>
                        </v-list>
                    </v-menu>
                </v-list>
            </v-navigation-drawer>
            <v-main class="" :class="movel ? null : 'pt-0'"
                style="z-index: 5 !important; box-sizing: border-box; overflow: hidden;">
                <slot />
                <div class="w-100" v-if="$page.props.logger === false">
                    <v-footer class="w-100 bg-light-green-darken-4 py-6 " v-if="!movel" height="300"
                    style="box-sizing: border-box;">
                    <section class="w-100 h-100" style="position: relative; ">
                        <section class="w-100 h-100 d-flex">
                            <section class="w-50 mx-8 d-flex">
                                <div class="w-50">
                                    <img src="/public/img/IconBranca.png" width="250" alt="">
                                    <div class="d-flex  align-start px-2" style="width: 250px;">
                                        <v-btn icon href="https://www.facebook.com/profile.php?id=100056057672246"
                                            target="_blank" class="mr-5">
                                            <svg class="w-50 h-50" fill="currentColor" viewBox="0 0 24 24"
                                                aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </v-btn>
                                        <v-btn icon href="https://www.instagram.com/jopemcp/" target="_blank" class="">
                                            <svg class="w-50 h-50" fill="currentColor" viewBox="0 0 24 24"
                                                aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                                                    clip-rule="evenodd" />
                                            </svg>

                                        </v-btn>
                                    </div>
                                </div>
                                <div class="w-50 d-flex">
                                    <v-list density="compact" class="bg-transparent ml-auto mr-10">

                                        <v-btn class="text-red" text="" target="_blank"
                                            href="https://www.facebook.com/profile.php?id=100056057672246"
                                            prepend-icon="mdi-access-point">
                                            <p style="color:black;">Live</p>
                                        </v-btn>
                                    </v-list>
                                </div>

                            </section>
                            <v-divider class="border-opacity-75 h-75" color="white" vertical></v-divider>
                            <section class=" w-50 d-flex">
                                <v-list density="compact" class="bg-transparent  ml-5 mr-10">
                                    <v-list-subheader class="text-white"
                                        style="font-weight: 600;">PÁGINA</v-list-subheader>
                                    <v-list-item class="text-black" href="#sobre" title="quem somos">
                                    </v-list-item>
                                    <v-list-item class="text-black" href="#eventos" title="eventos">
                                    </v-list-item>
                                    <v-list-item class="text-black" href="#midia" title="mídias">
                                    </v-list-item>
                                </v-list>
                                <v-list density="compact" class="bg-transparent mr-10">
                                    <v-list-subheader class="text-white"
                                        style="font-weight: 600;">SIGA-NOS</v-list-subheader>
                                    <v-list-item class="text-black" href="https://www.instagram.com/jopemcp/"
                                        target="_blank" title="instagram">
                                    </v-list-item>
                                    <v-list-item class="text-black"
                                        href="https://www.facebook.com/profile.php?id=100056057672246" target="_blank"
                                        title="Facebook">
                                    </v-list-item>
                                </v-list>

                            </section>
                        </section>


                        <section class="w-100 " style="position: absolute; bottom: 10px;">
                            <span class="text-sm text-gray">© 2024 <a class="text-black" href="https://JOPEMoviment.com"
                                    style="text-decoration: none;">JOPEMoviment™</a>. Tudo por
                                Cristo✝️.
                            </span>
                        </section>
                    </section>

                </v-footer>
                <v-footer v-else class="w-100 bg-light-green-darken-4 rounded py-6" height="350"
                    style="box-sizing: border-box;">
                    <section class="w-100 h-100" style="position: relative; ">
                        <section class="w-100 h-100">
                            <section class="w-100  d-flex">
                                <div class="w-50">
                                    <img src="/public/img/IconBranca.png" width="100" alt="">

                                </div>
                                <div class="w-50 d-flex align-end">
                                    <div class="d-flex  align-start px-2" style="width: 100px;">
                                        <v-btn icon href="#" class="mr-5">
                                            <svg class="w-50 h-50" fill="currentColor" viewBox="0 0 24 24"
                                                aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </v-btn>
                                        <v-btn icon href="#" class="">
                                            <svg class="w-50 h-50" fill="currentColor" viewBox="0 0 24 24"
                                                aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                                                    clip-rule="evenodd" />
                                            </svg>

                                        </v-btn>
                                    </div>

                                </div>

                            </section>

                            <section style="box-sizing: border-box;" class=" w-100 d-flex my-1">
                                <v-list density="compact" class="bg-transparent ">
                                    <v-list-subheader class="text-white"
                                        style="font-weight: 600;">PÁGINA</v-list-subheader>
                                    <v-list-item class="text-black" title="quem somos">
                                    </v-list-item>
                                    <v-list-item class="text-black" title="eventos">
                                    </v-list-item>
                                    <v-list-item class="text-black" title="mídias">
                                    </v-list-item>
                                </v-list>
                                <v-list density="compact" class="bg-transparent ml-5">
                                    <v-list-subheader class="text-white"
                                        style="font-weight: 600;">SIGA-NOS</v-list-subheader>
                                    <v-list-item class="text-black" title="instagram">
                                    </v-list-item>
                                    <v-list-item class="text-black" title="Facebook">
                                    </v-list-item>
                                </v-list>

                            </section>
                        </section>


                        <section class="w-100 " style="position: absolute; bottom: 0px;">
                            <span class="text-sm text-gray">© 2024 <a class="text-black" href="https://JOPEMoviment.com"
                                    style="text-decoration: none;">JOPEMoviment™</a>. Tudo por
                                Cristo✝️.
                            </span>
                        </section>
                    </section>

                </v-footer>
                </div>
                
            </v-main>


        </v-layout>
    </v-app>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3'
import { Inertia } from '@inertiajs/inertia'
export default {
    props: {
        colorBar: String,
        Logo: String,
        movel: Boolean,
        elevacao: Number
    },
    data() {
        return {
            drawer: false,
            username: null,
        }
    },
    mounted() {
        if (this.$page.props.logger === true) {
            this.username = this.$page.props.user.username
        }
        console.log(this.movel)
    }


}
</script>