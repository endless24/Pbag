<template>
    <web-layout title="Event Details">
        <div class=" min-h-screen w-full flex py-20 items-baseline bg-white justify-center">
            <div class=" w-96 sm:w-8/12  md:w-8/12 lg:w-8/12 grid  grid-cols-1 md:grid-cols-2 bg-gray-100 overflow-hidden rounded shadow-md ">
               <div class="col-span-1 ">
                    <img :src="'/storage/img_event/'+ eventpost.image " alt="not found" class=" min-h-full w-full  " />
               </div>
               <div class="col-span-1">
                   <div class="my-4 capitalize font-bold text-yellow-600  px-4 tracking-wider text-xl ">
                       {{ eventpost.title }}
                   </div>
                   <div class="px-4 text-justify font-serif text-gray-700">
                        {{ eventpost.content }}
                   </div>
                    <div class="text-right p-4">
                      <span class="font-semibold">Date : </span>
                       <span class="text-sm text-yellow-600"> {{ eventpost.pdate }}</span>
                    </div>
               </div>
            </div>
        </div>
    </web-layout>
</template>

<script>
import WebLayout from '../Layouts/WebLayout.vue';
import {usePage} from "@inertiajs/inertia-vue3";
import axios from "axios"
export default {
    components : {WebLayout},
    props:{
        eventpost:Object
    },
    data(){
        return{
             
        }
    },
    // methods: {
    //  fetchEvent(){
    //         axios.post(route('api.fetch.event'))
    //         .then((res) => {
    //             this.events = res.data
    //         })
    //         .catch((ex) => {
    //             console.log(ex);
    //         })
    //     },
    // },
    // mounted(){
    //    this.fetchEvent()
    // }
}
</script>

<style>

</style>