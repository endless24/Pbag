<template>
    <div>
        <Head :title="title" />

        <!-- NAVE BAR -->
        <div class=" h-screen w-60  bg-gradient-to-b from-blue-500 to-blue-800  fixed left-0 top-0  py-6 px-2 z-50">
            <div class="container max-w-7xl mx-auto">
                <a href="#" class="w-full py-3 px-6 inline-block">
                   <span class=" font-bold text-2xl text-gray-50">Control Panel</span>
                </a>

                <div class=" h-1 mb-6 mt-2" style="border-bottom: 1px solid #999;"></div>
        
                <Link :href="route('dashboard')" :class="navclasses" id="navbar">
                    <font-awesome :icon="['fas', 'home']" /> Dashboard
                </Link>
                <Link :href="route('add_post')" :class="navclasses">
                    <font-awesome :icon="['fas', 'pen']" /> Add Post
                </Link>
                <Link @click="deleteToken()" :class="navclasses" id="navbar">
                    <font-awesome :icon="['fas', 'power-off']" /> Logout
                </Link>
                <!-- <Link :href="route('addposts')" :class="navclasses">
                    <font-awesome :icon="['far', 'edit']" /> Make Post
                </Link> -->
                <!-- <Link :href="route('about')" :class="navclasses">
                    <font-awesome :icon="['fas', 'info-circle']" /> About Us
                </Link> -->
                <!-- <Link :href="route('contact')" :class="navclasses">
                    <font-awesome :icon="['fas', 'phone']" /> Contact Us
                </Link> -->
            </div>
        </div>

        <div class=" py-5 fixed top-0 w-full bg-gray-50 shadow-md">
            <div class=" mx-auto max-w-3xl grid grid-cols-2">
                <div class=" col-span-1 text-right ">
                    <span  :class="badge1" class="mr-8" title="Read Message">
                        <font-awesome :icon="['fas', 'bell']" class=" mr-2"/>
                        <span :class="badge" style=" font-size:0.5rem;">3+</span>
                    </span>
                    <span  :class="badge1" title="Read Message">
                        <font-awesome :icon="['fas', 'envelope']" class=" mr-2"/>
                        <span :class="badge" style=" font-size:0.5rem;">1</span>
                    </span>
                </div>
                
                <div class=" text-gray-500 text-right">
                    <!-- {{ Auth::user()->name }} -->
                    <span>Innocent Chiemerie</span> &nbsp;
                    <img src="images/avatar.png" alt="Image" class=" w-8 inline">
                </div>
            </div>
        </div>
        <!-- END OF NAV BAR -->
        <div class="min-h-screen bg-gray-100">
            <!-- Page Content -->
            <main class=" ml-64 pt-28">
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
                navclasses : 'text-md w-full block my-4 text-gray-300 px-6 py-3 bg-gray-600 rounded-full hover:text-white hover:bg-gradient-to-b from-gray-400 to-gray-600 font-semibold',
                badge : 'text-gray-100 uppercase font-bold rounded-sm absolute  top-0 right-0 bg-red-700 px-0.5',
                badge1 : 'relative cursor-pointer text-gray-400 hover:text-gray-500'
            }
        },

        methods: {
            logout() {
                axios.post(route('logout'))
                .then(() => {
                    this.$inertia.visit(route('home'), { method: 'get' });
                })
            },
            deleteToken(){
                let Headers = {
                    headers : {
                        'Authorization' : 'Bearer ' + localStorage.token,
                    }
                }
                axios.post(route('delete_token'), {}, Headers)
                .then((res) => {
                    if (res.data.status == 'success') {
                        localStorage.removeItem('token');
                        this.logout();
                    }
                })
            }
        }
    })
</script>

<style scoped>
#navbar{
    box-shadow: 2.0px 5.0px 5.0px hsl(0deg 0% 0% / 0.38);
}
</style>
