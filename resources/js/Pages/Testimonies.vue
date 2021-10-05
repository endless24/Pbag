<template>
    <web-layout>
        <!-- card about the church -->
        <div class=" bg-white rounded overflow-hidden  ">
            <div class="h-52 mx-auto max-w-7xl" :style="{'background-image':'url(images/prayer1.jpeg)', 'background-size':'cover','background-position':'center'}">
              <!-- <h1 class="text-4xl font-bold font-serif capitalize pl-24 pt-16 text-white "> testimony</h1> -->
            </div>
            <div class=" mt-10">
                <div class=" lg:p-20 p-10 mx-auto max-w-7xl grid grid-cols-1 md:grid-cols-2 gap-2">
                    <div class="col-span-1 lg:p-6">
                        <div class="text-md font-mono gap-4 tracking-wide font-bold text-yellow-600 mb-6 uppercase">Your Testimony</div>
                        <hr class="border-yellow-600 border w-20 my-8">
                        <div class="lg:text-5xl text-3xl text-gray-700 text-left text-big font-bold">
                            Sharing your testimony glorifies the name of the Lord, So share yours Today and be blessed.
                        </div>
                    </div>
                    <div class="col-span-1 p-6">
                        <form name="frmContact" @submit.prevent="addTestimony()" >
                            <div class="grid md:grid-cols-2 gap-1">
                                <div class="mb-4 col-span-1">
                                    <label for="Fullname" class="mb-2 text-xl">
                                        <!-- <font-awesome :icon="['far', 'user']" class="" />  -->
                                        Fullname<span class="text-yellow-600">*</span>
                                    </label>
                                    <input type="text" :class="inputClass" id="inputShadow" v-model="fullname" placeholder="Your Name" required>
                                </div>
                                <div class="mb-4">
                                    <label for="Email" class="mb-2 text-xl">
                                        <!-- <font-awesome :icon="['fas', 'envelope']" class="" />  -->
                                        Email
                                    </label>
                                    <input type="email" :class="inputClass" id="inputShadow" v-model="email" placeholder="Your Email">
                                </div>
                            </div>
                            <div class="grid md:grid-cols-2 gap-1">
                                <div class="mb-4 col-span-1">
                                    <label for="Phone" class="mb-2 text-xl">
                                        <!-- <font-awesome :icon="['far', 'user']" class="" />  -->
                                        Phone<span class="text-yellow-600">*</span>
                                    </label>
                                    <input type="text" :class="inputClass" id="inputShadow" v-model="phone" placeholder="Your Phone Number" required>
                                </div>
                                <div class="mb-4">
                                    <label for="Title" class="mb-2 text-xl">
                                        <!-- <font-awesome :icon="['fas', 'envelope']" class="" />  -->
                                        Title<span class="text-yellow-600">*</span>
                                    </label>
                                    <input type="text" :class="inputClass" id="inputShadow" v-model="subject" placeholder="Your Testimony Title" required>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="Testimony" class="mb-2 text-xl">
                                    <!-- <font-awesome :icon="['far', 'edit']" class="" /> -->
                                     Testimony<span class="text-yellow-600">*</span>
                                </label>
                                <textarea :class="inputClass" id="inputShadow" class="h-36 resize-none" v-model="content" placeholder="Your Testimony..." required></textarea>
                            </div>
                            <div class="mb-4">
                                <button type="submit" class="py-1 px-3 h-12 rounded text-blue-900 font-bold" id="addbtn">
                                    Submit
                                    <font-awesome :icon="['fas', 'plus']" class="" /> 
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>



    </web-layout>
</template>

<script>
import WebLayout from '../Layouts/WebLayout.vue';
import { usePage } from "@inertiajs/inertia-vue3";

export default {
  components: { WebLayout },
  data(){
      return {
            inputClass: 'block h-10 rounded w-full px-3 border border-gray-50',

                fullname:'',
                email:'',
                phone:'',
                subject:'',
                content:'',
            testimonies:[],
    }
  },
  methods: {
        addTestimony(){
            axios.post(route('api.store.testimony'), { fullname: this.fullname, email: this.email, phone: this.phone, subject: this.subject, content: this.content})
            .then((res) => {
                if (res.data.status == 'success') {
                    alert (res.data.msg)
                    this.fullname = '';
                    this.email = '';
                    this.phone = '';
                    this.subject = '';
                    this.content = '';
                    this.fetchTestimony();
                    // window.location.reload();
                    this.$inertia.visit('');
                } else {
                    alert (res.data.msg)
                }
            })
            .catch((ex) => {
                console.log(ex);
            })
        },
        fetchTestimony(){
            axios.post(route('api.fetch.testimony'))
            .then((res) => {
                this.testimonies = res.data
            })
            .catch((ex) => {
                console.log(ex);
            })
        }
    },
    mounted(){
        this.fetchTestimony()
    }

}
</script>

<style>
.banner-home{
    height: 39.9rem;
    background-position: center;
}

.con-btn:hover{
    box-shadow: 4.0px 8.0px 8.0px hsl(0deg 10% 10% / 0.38);
}

#inputShadow{
    box-shadow: 2.0px 4.0px 4.0px hsl(0deg 0% 0% / 0.38);
}

.text-big{
    text-shadow: 2.0px 2.0px 2.0px hsl(0deg 0% 0% / 0.38);
}

#addbtn{
    box-shadow: 2.0px 4.0px 4.0px hsl(0deg 0% 0% / 0.38);
}

#addbtn:hover{
    background: #0000CD;
    color: #fff;
}

</style>
