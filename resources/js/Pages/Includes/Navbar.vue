<template>
    <div class=" bg-gray-900  py-2 sticky top-0 w-full z-50">
        <div class="container max-w-7xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-3">
                <div class=" col-span-1 text-3xl text-center">
                    <span class=" px-2 py-2 rounded-full cursor-pointer">
                        <span class=" bg-yellow-600 text-white px-3 py-2 text-xl rounded-full font-semibold hword"  id="hword1">
                            <i>GTC</i>
                        </span>
                    <i class=" text-yellow-600" ></i>
                    <span class=" text-white py-3 hword">Church</span>
                    </span>
                </div>
                <div class="col-span-2 py-2">
                    <Link :href="route('home')" :class="navclasses" class="navbar">
                        <!-- <font-awesome :icon="['fas', 'home']" />  -->
                        Home
                    </Link>

                    <Link :href="route('about')" :class="navclasses" class="navbar">
                        <!-- <font-awesome :icon="['fas', 'info']" />  -->
                        About
                    </Link>

                    <Link :href="route('contact')" :class="navclasses" class="navbar">
                        <!-- <font-awesome :icon="['fas', 'phone']" />  -->
                        Contact
                    </Link>
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
            navclasses : 'text-sm text-white px-3 hover:text-yellow-600  hover:transition duration-500 font-semibold tracking-widest uppercase'
        }
    }
}
</script>

<style>
.navbar{
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
}

#hword1{
    box-shadow: 2.0px 4.0px 4.0px hsl(0deg 10% 10% / 0.36);
}

.hword{
    text-shadow: 2.0px 4.0px 4.0px hsl(0deg 10% 10% / 0.30);
}
</style>