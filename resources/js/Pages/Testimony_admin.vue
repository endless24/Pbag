<template>
    <app-layout title="Testimonies">
      
        <div class="md:grid grid-cols-3 gap-8">
            <div class=" relative shadow_mission rounded overflow-hidden shadow-xl col-span-1 " v-for="(testimony, i) in testimonies" :key="i" :value="testimony.id">
                <div class="bg-gray-500 mb-3">
                <!-- <div class=" bg-gray-600 text-yellow-600 w-full h-full z-50 cover_img">Hello</div> -->
                <img :src="'/storage/img_testimony/'+ testimony.image " alt="not found" srcset="" class=" w-full h-52">
                </div>
                <div class="px-3 pb-3 max-h-32 overflow-y-scroll">
                    <h1 class=" text-2xl capitalize font-serif mb-2 text-yellow-600 hover:transition-all duration-500">
                        {{ testimony.subject }}
                    </h1>
                    <h1 class=" text-justify text-gray-700 text-sm font-serif">
                        {{ testimony.content }}
                    </h1>
                </div>
                <div class=" absolute top-0 right-1 text-yellow-600  rounded-full "> 
                    <div class=" text-3xl cursor-pointer" title="Delete"  @click="deleteTestimony(testimony.id)"> 
                        <font-awesome :icon="['fas', 'times']" /></div>
                </div>
                <div class="px-3 pb-3 text-yellow-600">
                    <span class=" lg:border-r-2 pr-2 lg:inline-block block font-semibold text-xs  border-yellow-600">  {{ testimony.fullname }}</span>
                    <span class="lg:border-r-2 lg:px-2 lg:mb-0 mt-1 lg:inline-block block  font-semibold text-xs border-yellow-600">{{ testimony.phone }}</span>
                    <span class="lg:pl-2 font-semibold text-xs">{{ testimony.email }}</span>
                 </div>
            </div>
        </div>
  </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue'    
import axios from 'axios'
import { Method,createHeadManager } from '@inertiajs/inertia'
export default {
    components: { AppLayout,Head },
    data(){
        return{
            testimonies:[],
        }
    },

    methods:{
    fetchTestimony(){
        axios.post(route('api.fetch.testimony'))
            .then((res) => {
                // console.log(res);
                this.testimonies = res.data;
                // this.deleteTestimony();
            })
            .catch((ex) => {
                console.log(ex);
            })
        },


         deleteTestimony(id){
            if (confirm('are you sure you want to delete ?')) {
                axios.post(route('api.delete.testimony'), {id: id})
                .then((res) =>{
                    // console.log(res);
                    if(res.data.code == 200){
                        alert(res.data.msg)
                        this.fetchTestimony()
                    }
                    if(res.data.code == 500){
                        alert(res.data.msg)
                    }
                })
            }else{
                alert('Testimony is safe')
            }
        },

    },


    
    mounted(){
        this.fetchTestimony();
    }
}



</script>

<style>

</style>