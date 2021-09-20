<template>
    <div>
        <Head :title="title" />

        <!-- NAVE BAR -->
        <div class=" h-screen w-60  bg-gradient-to-b from-blue-700 to-gray-700  fixed left-0 top-0  py-3">
            <div class="container max-w-7xl mx-auto">
                <!-- <button @click="deleteToken()" class=" w-16 h-10 bg-gray-600 text-gray-50">
                    Logout
                </button> -->

                <Link :href="route('dashboard')" :class="navclasses" id="navbar">
                    <font-awesome :icon="['fas', 'home']" /> Dashboard
                </Link>
                <Link @click="deleteToken()" :class="navclasses" id="navbar">
                    <font-awesome :icon="['fas', 'power-off']" /> Logout
                </Link>
                <!-- <Link :href="route('categories')" :class="navclasses">
                    <font-awesome :icon="['fas', 'layer-group']" /> Category
                </Link> -->
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
        <!-- END OF NAV BAR -->
        <div class="min-h-screen bg-gray-100">
            <!-- Page Content -->
            <main class=" ml-64">
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
                navclasses : 'text-md w-full block my-3 text-white px-6 py-3 bg-gray-600 rounded-full hover:text-gray-200 hover:bg-gradient-to-b from-gray-400 to-gray-600 font-semibold'
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
