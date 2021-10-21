<template>
    <div class="min-h-screen w-full bg-gray-600 flex items-center justify-center" >
        <div class="w-11/12 sm:w-9/12 md:w-2/5 lg:w-1/3" id="r_body">
            <div class="p-4 bg-gray-800 rounded-t">
                <span class=" px-2 py-2 rounded-full cursor-pointer">
                    <span class=" bg-yellow-600 text-white px-3 py-2 text-xl rounded-full font-semibold hword"  id="hword1">
                        <i>GTC</i>
                    </span>
                    <span class=" text-white py-3 font-semibold hword"> Church</span>
                </span>
            </div>
           <div class="p-4 rounded-b bg-gray-50">
                <form @submit.prevent="registerUser()" class="pt-4">
                    <div :class="form_group">
                        <label for="fullname" :class="labels">
                            <font-awesome :icon="['fas', 'user']" /> Fullname
                        </label>
                        <input type="text" id="name" :class="inputs" v-model="name" required>
                    </div>
                    
                    <div :class="form_group">
                        <label for="email" :class="labels">
                            <font-awesome :icon="['fas', 'envelope']" /> Email
                        </label>
                        <input type="text" id="email" :class="inputs" v-model="email" required>
                    </div>
                    <div :class="form_group">
                        <label for="phone" :class="labels">
                            <font-awesome :icon="['fas', 'phone']" /> Phone Number
                        </label>
                        <input type="text" id="phone" :class="inputs" v-model="phone">
                    </div>
                    <div :class="form_group">
                        <label for="password" :class="labels">
                            <font-awesome :icon="['fas', 'key']" /> Password
                        </label>
                        <input type="password" id="password" :class="inputs" v-model="password" required>
                    </div>
                    <div :class="form_group">
                        <label for="password" :class="labels">
                            <font-awesome :icon="['fas', 'lock']" /> Confirm Password
                        </label>
                        <input type="password" id="cpassword" :class="inputs" v-model="cpassword" required>
                    </div>
                    <div :class="form_group">
                        <button type="submit" :class="btns" class="bg-gray-800 text-white">
                            <font-awesome :icon="['fas', 'user-plus']" /> Sign Up
                        </button>
                    </div>
                    <div class="text-center text-sm cursor-pointer text-blue-600 animate-pulse">
                        <Link :href="route('login')">
                            Already have an account, Sign In.
                        </Link>
                    </div>
                </form>
           </div>
        </div>
    </div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo.vue'
import axios from 'axios';

export default {
    components:{
        Link,
        JetAuthenticationCardLogo
    },
    data(){
        return {
            form_group:'mb-4',
            inputs:'w-full h-9 rounded px-3 block',
            labels:'mb-2 font-bold',
            btns: 'px-4 py-1 rounded',
            // getting data from inputs
            name :'',
            email : '',
            phone : '',
            password : '',
            cpassword : '',
            // errors:{
            //     lastname:[]
            // }
        }
    },
    methods: {
        registerUser(){
            let formData = {
                name: this.name,
                email: this.email,
                phone: this.phone,
                password: this.password,
                password_confirmation: this.cpassword,
            }

            axios.post(route('register'), formData)
            .then(res => {
                // if(res.data.status == 'success'){
                    this.$inertia.visit(route('dashboard'));
                // }else{
                //     alert('An Error occured!')
                // }
            })
            .catch(err => {
                if (err.response) {
                    this.errors = err.response.data.errors
                } else {
                    console.log('Network Error');
                }
            })
        }
    }
}
</script>

<style scoped>

#r_body{
    box-shadow: 4.0px 8.0px 8.0px hsl(0deg 0% 0% / 0.78);
}

#hword1{
    box-shadow: 2.0px 4.0px 4.0px hsl(0deg 10% 10% / 0.36);
}

.hword{
    text-shadow: 2.0px 4.0px 4.0px hsl(0deg 10% 10% / 0.30);
}
</style>
