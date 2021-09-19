<template>
    <div class="h-12 bg-gray-900  py-3">
        <div class="container max-w-7xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-3">
                <div class="col-span-2">
                    <button @click="deleteToken()" class=" w-16 h-10 bg-gray-600 text-gray-50">
                        Logout
                    </button>

                    <!-- <Link :href="route('home')" :class="navclasses">
                        <font-awesome :icon="['fas', 'home']" /> Home
                    </Link> -->
                    <!-- <Link :href="route('posts')" :class="navclasses">
                        <font-awesome :icon="['far', 'comments']" /> Blog Post
                    </Link>
                    <Link :href="route('categories')" :class="navclasses">
                        <font-awesome :icon="['fas', 'layer-group']" /> Category
                    </Link>
                    <Link :href="route('addposts')" :class="navclasses">
                        <font-awesome :icon="['far', 'edit']" /> Make Post
                    </Link>
                    <Link :href="route('about')" :class="navclasses">
                        <font-awesome :icon="['fas', 'info-circle']" /> About Us
                    </Link>
                    <Link :href="route('contact')" :class="navclasses">
                        <font-awesome :icon="['fas', 'phone']" /> Contact Us
                    </Link> -->
                </div>
                <div class="text-right">
                    <!-- <Link :href="route('login')" :class="navclasses">
                        <font-awesome :icon="['fas', 'sign-in-alt']" /> Login
                    </Link>
                    <Link :href="route('register')" :class="navclasses">
                        <font-awesome :icon="['fas', 'registered']" /> Register
                    </Link> -->
                    
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import NavLink from '../../Jetstream/NavLink.vue'
import {Link} from "@inertiajs/inertia-vue3";
export default {
    components: { NavLink, Link },
    props:{
        canMakePost : Boolean
    },
    data(){
        return {
            navclasses : 'text-md text-white px-3 hover:text-gray-300 font-semibold'
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
}
</script>

<style>

</style>        