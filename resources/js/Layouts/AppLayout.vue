<template>
    <div>
        <Head :title="title" />

        <button @click="deleteToken()" class=" w-16 h-10 bg-gray-600 text-gray-50">
            Logout
        </button>

        <div class="min-h-screen bg-gray-100">
            <!-- Page Content -->
            <main>
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
