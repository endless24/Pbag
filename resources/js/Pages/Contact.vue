<template>
    <web-layout title="Contact">
        <div class=" bg-white rounded overflow-hidden  ">
            <div class="h-52 mx-auto max-w-7xl rounded-b overflow-hidden" :style="{'background-image':'url(images/top.jpg)', 'background-size':'cover','background-position':'right'}">
              <h1 class="text-4xl font-bold font-serif capitalize pl-24 pt-16 text-white ">contact - us</h1>
            </div>
            <div class=" mt-8">
                <div class=" lg:p-20 p-10 mx-auto max-w-7xl gap-9 grid grid-cols-1 md:grid-cols-2">
                    <div class="col-span-1 lg:px-5 ">
                        <h1 class="text-yellow-600 font-bold pb-4 text-sm uppercase">
                            contact form
                            </h1>
                        <div class="con-font font-bold font-sans text-3xl lg:text-5xl text-gray-800 capitalized">
                            Send Us a Message
                        </div>
                        <hr class="border my-6 border-yellow-600 w-20">
                        <form  @submit.prevent="addcontact()">
                            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                                <div class="col-span-1">
                                    <label for="name">fullname<span class="text-xl text-yellow-600">*</span></label>
                                   <div class="py-2">
                                        <input type="text " required v-model="contact.fullname" placeholder="Your Name" class=" px-2 outline-none shadow-md rounded w-full h-10 border">
                                   </div>
                                </div>

                                <div class="col-span-1">
                                    <label for="name">Email<span class="text-xl text-yellow-600">*</span></label>
                                   <div class="py-2">
                                        <input type="email " required v-model="contact.email" placeholder=" Your Email" class="shadow-md px-2 outline-none rounded w-full h-10 border ">
                                   </div>
                                </div>
                            </div>
                            <div class="">
                                <label for="name">Message<span class="text-xl text-yellow-600">*</span></label>
                                <div class="py-2">
                                     <textarea name="" required v-model="contact.content" placeholder="Your Message..." class=" shadow-md px-2 rounded w-full h-36  resize-none outline-none"></textarea> 
                                </div>
                            </div>
                              <div class="mt-3">
                                <button class="text-gray-700 rounded lg:px-6 px-2 py-1 font-bold lg:py-2  shadow hover:transition-all duration-700 hover:text-white  hover:bg-yellow-600"> 
                                    Send
                                     <font-awesome :icon="['fas', 'plus']" class="" /> 
                                    </button>
                            </div>
                        </form>
                    </div>
                    <div class="col-span-1 lg:mt-0 mt-4">
                        <h1 class="text-yellow-600 font-bold pb-4 text-sm uppercase">
                            location
                            </h1>
                        <div class="con-font font-bold text-3xl lg:text-5xl text-gray-800 capitalized">
                           Contact info
                        </div>
                        <hr class="border my-6 border-yellow-600 w-20">
                        <div class="">
                            <ul class=" w-72">
                                <li class=" py-6 text-gray-900 capitalize">
                                    <span class="font-bold ">Email: </span>
                                    <a href="mailto:cnwankwo211@gmail.com" class="text-gray-500 hover:text-blue-600"> cnwankwo211@gmail.com</a>
                                </li>
                                <div class=" pb-3 text-gray-900 capitalize grid grid-cols-1 sm:grid-cols-5">
                                    <div class="font-bold col-span-1 ">Phone: </div>
                                    <div class="col-span-4">
                                        <a href="tel:+2349130720457" class="text-gray-500 block"> +2349130720457</a>
                                        <a href="tel:+2347047100834" class="text-gray-500 block"> +2347047100834</a>
                                        <a href="tel:+2348179827656" class="text-gray-500 block"> +2348179827656</a>
                                    </div>
                                </div>
                                
                                <li class=" text-gray-900 capitalize">
                                    <span class="font-bold">Address:</span>
                                    <span class="text-gray-500 capitalize"> No 18 ogbudike street
                                    okpoko onitsha, Anambra state, Nigeria.</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </web-layout>
</template>

<script>
import WebLayout from '../Layouts/WebLayout.vue';
import { usePage ,Head } from "@inertiajs/inertia-vue3";
import axios from 'axios';

export default {
  components: { WebLayout,Head },
  data(){
      return {
          contact:{
                  fullname:'',
                  email:'',
                  content:'',
              },
        }
    },
    methods:{
        addcontact(){
            axios.post(route('api.store.contact'), {contat: this.contact})
            .then((res)=>{
               if (res.data.status =='success') {
                    alert(res.data.msg);
                    this.contact='';
                    this.$inertia.visit('');
               }else{
                    alert(res.data.msg);
               }
            })
        }
    }

}
</script>

<style>

.con-font{
    font-family: 'Times New Roman', Times, serif;
}
</style>
