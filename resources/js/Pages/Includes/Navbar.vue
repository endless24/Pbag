<template>
    <div class=" bg-gray-900  py-2 sticky top-0 w-full z-50">
        <div class="container max-w-7xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-3">
                <div class=" col-span-1 text-3xl lg:text-center">
                    <span class=" px-2 py-2 rounded-full cursor-pointer">
                        <span class=" bg-yellow-600 text-white px-3 py-2 text-xl rounded-full font-semibold hword"  id="hword1">
                            <i>GTC</i>
                        </span>
                        <i class=" text-yellow-600" ></i>
                        <span class=" text-white py-3 hword">Church</span>
                    </span>
                     <span class="float-right text-2xl lg:hidden border-yellow-600 rounded mr-3 cursor-pointer py-1 px-2 bg-yellow-600" @click="toggleMenu = !toggleMenu">
                        <font-awesome :icon="['fas', 'bars']" class="text-white" />
                    </span>
                </div>
               
                <div class="col-span-2 lg:py-2 pt-7 "  :class="toggleMenu?'hidden lg:block':'block'">
                    <Link :href="route('home')" :class="navclasses" class="navbar">
                        <font-awesome :icon="['fas', 'home']" class="text-yellow-600" /> 
                        Home
                    </Link>

                    <Link :href="route('about')" :class="navclasses" class="navbar">
                        <font-awesome :icon="['fas', 'info']" class="text-yellow-600"/> 
                        About
                    </Link>

                    <Link :href="route('contact')" :class="navclasses" class="navbar">
                        <font-awesome :icon="['fas', 'phone']" class="text-yellow-600"/> 
                        Contact
                    </Link>
                    <Link :href="route('testimony')" :class="navclasses" class="navbar">
                        <font-awesome :icon="['fas', 'praying-hands']" class="text-yellow-600"/> 
                        Testimony
                    </Link>
                    
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
            toggleMenu:true,
            navclasses : 'text-sm text-white px-3 py-3 hover:text-yellow-600  block lg:inline-block  hover:transition duration-500 font-semibold tracking-widest uppercase'
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