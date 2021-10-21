<template>
    <div class="min-h-screen w-full bg-gray-600 flex items-center justify-center">
        <div class="w-11/12 sm:w-9/12 md:w-2/5 lg:w-1/3 " id="r_body">
            <div class="bg-gray-800 p-4 rounded-t"> 
                <span class=" px-2 py-2 rounded-full cursor-pointer">
                    <span class=" bg-yellow-600 text-white px-3 py-2 text-xl rounded-full font-semibold hword"  id="hword1">
                        <i>GTC</i>
                    </span>
                    <span class=" text-white py-3 font-semibold hword"> Church</span>
                </span>
            </div>
            <div class="p-4 bg-gray-100 rounded-b ">
                <form @submit.prevent="loginUser()" class="pt-4">
                    <div :class="form_group">
                        <label for="email" :class="labels">
                            <font-awesome :icon="['fas', 'envelope']" /> Email Address
                        </label>
                        <input type="text" id="email" :class="inputs" v-model="form.email">
                    </div>
                    <div :class="form_group">
                        <label for="password" :class="labels">
                            <font-awesome :icon="['fas', 'key']" /> Password
                        </label>
                        <input type="password" id="password" :class="inputs" v-model="form.password">
                    </div>
                    <div :class="form_group">
                        <input type="checkbox" id="remember" v-model="form.remember">
                        <label for="remember" :class="labels" class="font-normal"> Remember Me </label>
                    </div>
                    <div :class="form_group">
                        <button type="submit" :class="btns" class="bg-gray-800 text-white">
                            <font-awesome :icon="['fas', 'sign-in-alt']" /> Sign In
                        </button>
                    </div>
                    <div class="text-center text-sm cursor-pointer text-blue-600 animate-pulse">
                        <Link :href="route('register')">
                            Don't have an account, Sign Up.
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

export default {
    components:{
        Link,
        JetAuthenticationCardLogo
    },
    data(){
        return {
            form_group:'mb-4',
            inputs:'w-full h-9 rounded px-3 block',
            labels:'my-3 font-bold',
            btns: 'px-4 py-1 rounded',
            // getting data ffrom inputs
            form: this.$inertia.form({
            email : '',
            password : '',
            remember: false,
            }),
            errors:{
                email:[],
                password:[]
            }
        }
    },
    methods: {
            loginUser(){
            axios.get('/sanctum/csrf-cookie') //Set thr session cookies for CSRF-Token
            .then(() => {
                this.form.transform(data => ({
                        ... data,
                        remember: this.form.remember ? 'on' : ''
                    }))
                    .post(route('login'), {
                        onFinish : () => {
                            this.form.reset('email', 'password');
                        }
                    })
            });

        // loginUser(){
        //     let formData = {
        //         email: this.email,
        //         password: this.password,
        //         remember: this.remember == true ? 'on':''
        //     }
        //     axios.post(route('login'), formData)
        //     .then(res => {
        //         if(res.data.status == 'success'){
        //             localStorage.token = res.data.result.apitoken;
        //             this.$inertia.visit(route('dashboard'));
        //         }else{
        //             alert('An Error occured!')
        //         }
        //     })
        //     .catch(err => {
        //         if (err.response) {
        //             this.errors = err.response.data.errors
        //         } else {
        //             console.log('Network Error');
        //         }
        //     })
        
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
