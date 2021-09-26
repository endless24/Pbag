<template>
    <div>
        <Head :title="title" />

        <!-- NAVE BAR -->
        <div class=" bg-yellow-600 h-screen w-60  fixed left-0 top-0  py-6 px-2 z-50 hidden lg:block" style="background:;">
            <div class="container max-w-7xl mx-auto">
                <a href="#" class="w-full py-3 px-6 inline-block">
                   <span class=" font-bold text-2xl text-gray-50">Control Panel</span>
                </a>

                <div class=" h-1 mb-6 mt-2" style="border-bottom: 1px solid #999;"></div>
        
                <Link :href="route('dashboard')" :class="navclasses" id="navbar">
                    <font-awesome :icon="['fas', 'home']" /> Dashboard
                </Link>
                <Link :href="route('add_category')" :class="navclasses">
                    <font-awesome :icon="['fas', 'layer-group']" /> Add Category
                </Link>
                <Link :href="route('add_post')" :class="navclasses">
                    <font-awesome :icon="['fas', 'pen']" /> Add Product
                </Link>
                <Link @click="logout()" :class="navclasses" id="navbar">
                    <font-awesome :icon="['fas', 'power-off']" /> Logout
                </Link>
                
            </div>
        </div>

        <div class=" py-5 fixed top-0 w-full bg-gray-50 shadow-md">
            <div class=" mx-auto max-w-3xl grid grid-cols-3">
                <div class=" col-span-1 mx-4">
                    <span class="py-2 px-3 rounded-full text-xl text-blue-600 cursor-pointer hover:bg-gray-200 hover:transition duration-500 lg:hidden">
                        <font-awesome :icon="['fas', 'bars']" class="" id="me"/>
                    </span>
                </div>
                <div class=" col-span-1 text-center py1 hidden lg:block">
                    <span  :class="badge1" class="mr-8" title="Read Message">
                        <font-awesome :icon="['fas', 'bell']" class=" mr-2"/>
                        <span :class="badge" style=" font-size:0.5rem;">3+</span>
                    </span>
                    <span  :class="badge1" title="Read Message">
                        <font-awesome :icon="['fas', 'envelope']" class=" mr-2"/>
                        <span :class="badge" style=" font-size:0.5rem;">1</span>
                    </span>
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

                 user: this.$page.props.user,

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
            // deleteToken(){
            //     let Headers = {
            //         headers : {
            //             'Authorization' : 'Bearer ' + localStorage.token,
            //         }
            //     }
            //     axios.post(route('delete_token'), {}, Headers)
            //     .then((res) => {
            //         if (res.data.status == 'success') {
            //             localStorage.removeItem('token');
            //             this.logout();
            //         }
            //     })
            // },


        },
        mounted(){
            console.log(this.$page);
        }
    })

    

</script>

<style scoped>
#navbar{
    box-shadow: 2.0px 5.0px 5.0px hsl(0deg 0% 0% / 0.38);
}
</style>
