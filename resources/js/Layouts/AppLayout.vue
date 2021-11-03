<template>
    <div>
        <Head :title="title" />

        <!-- NAVE BAR -->
        <div  @click="showSide = !showSide" v-if="showSide" class="transition-all duration-700 fixed z-50 h-screen w-screen bg-black bg-opacity-70 top-0"></div>
        <div :class="showSide?'-left-0 lg:left-0':'-left-72 lg:left-0'" class="container transition-all duration-700 bg-yellow-600 z-50 py-6 px-2 fixed left-0 top-0 w-60 h-screen ">
            <div class="container max-w-7xl mx-auto">
                <a href="#" class="w-full py-3 px-6 inline-block">
                   <span class=" font-bold text-2xl text-gray-50">Control Panel</span>
                </a>

                <div class=" h-1 mb-6 mt-2" style="border-bottom: 1px solid #999;"></div>
        
                <Link :href="route('dashboard')" :class="navclasses" id="navbar">
                    <font-awesome :icon="['fas', 'home']" /> Dashboard
                </Link>
                <!-- <Link :href="route('add_category')" :class="navclasses">
                    <font-awesome :icon="['fas', 'layer-group']" /> Add Category
                </Link> -->
                <Link :href="route('add_post')" :class="navclasses">
                    <font-awesome :icon="['fas', 'pen']" /> Add Mission
                </Link>
                <Link :href="route('add_event')" :class="navclasses">
                    <font-awesome :icon="['fas', 'pen']" /> Add Event
                </Link>
                <Link :href="route('testimonys')" :class="navclasses">
                    <font-awesome :icon="['fas', 'praying-hands']" /> Testimonies
                </Link>
                <Link @click="logout()" :class="navclasses" id="navbar">
                    <font-awesome :icon="['fas', 'power-off']" /> Logout
                </Link>
                
            </div>
        </div>

        <div class=" py-5 fixed top-0 w-full bg-gray-50 shadow-md z-30">
            <div class=" mx-auto max-w-3xl grid grid-cols-3">
                <div class=" col-span-1 mx-4">
                    <span @click="showSide = !showSide" class=" bg-gray-300 px-3 py-2 rounded-full text-xl text-blue-600 cursor-pointer hover:bg-gray-200 hover:transition duration-500 lg:hidden">
                        <font-awesome :icon="['fas', 'bars']" class="" id="me"/>
                    </span>
                </div>
                <div class=" col-span-1 text-center py1 hidden lg:block">
                    <span  :class="badge1" class="mr-8" title="Read Message">
                        <font-awesome :icon="['fas', 'bell']" class=" mr-2"/>
                        <span :class="badge" style=" font-size:0.5rem;">3+</span>
                    </span>
                   <Link :href="route('testimonys')"> 
                     <span  :class="badge1" title="Read Testimony">
                        <font-awesome :icon="['fas', 'envelope']" class=" mr-2"/>
                        <span :class="badge" style=" font-size:0.6rem;">{{ testimony_counts }}</span>
                    </span>
                   </link>
                </div>
                
                <div class=" lg:col-span-1 text-gray-500 text-right mx-4 col-span-2">
                    <span class="">{{ user.name }}</span> &nbsp;
                    <img src="images/avatar.png" alt="Image" class=" w-8 inline">
                </div>
            </div>
        </div>
        <!-- END OF NAV BAR -->
        <div class="min-h-screen bg-gray-100">
            <!-- Page Content -->
            <main class=" mx-8 lg:ml-64 pt-28">
                <slot></slot>
            </main>
        </div>
    </div>
</template>

<script>
    import { defineComponent } from 'vue'
    import { Head, Link } from '@inertiajs/inertia-vue3';
    import AdminNavbar from '../Pages/Includes/AdminNavbar.vue'

import axios from 'axios';

    export default defineComponent({
        props: {
            title: String,
        },

        components: {
            Head, Link, AdminNavbar
        },

        data() {
            return {
                showSide:false,

                user: this.$page.props.user,
                
                navclasses : 'text-md w-full block my-4 text-gray-300 px-6 py-3 bg-gray-600 rounded-full hover:text-white hover:bg-gradient-to-b from-gray-400 to-gray-600 font-semibold',
                badge : 'text-gray-100  font-bold rounded-sm absolute  top-0 right-0 bg-red-700 px-0.5',
                badge1 : 'relative cursor-pointer text-gray-400 hover:text-gray-500',

                testimony_counts:'',
            }
        },

        methods: {
            logout() {
                axios.post(route('logout'))
                .then(() => {
                    this.$inertia.visit(route('home'), { method: 'get' });
                })
            },

             fetchcount_testimony(){
                axios.post(route('api.count.testimony'))
                .then((res) => {
                    this.testimony_counts = res.data
                })
                .catch((ex) => {
                    console.log(ex);
                })
            },
            
        },
        mounted(){
            console.log(this.$page);
            this. fetchcount_testimony();
        }
    })

    

</script>

<style scoped>
#navbar{
    box-shadow: 2.0px 5.0px 5.0px hsl(0deg 0% 0% / 0.38);
}

</style>
