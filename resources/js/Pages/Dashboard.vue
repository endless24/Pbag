<template>
    <app-layout title="Dashboard">
        <div class=" grid grid-cols-1 gap-4 md:grid-cols-3">
            <div class="rounded shadow-md col-span-1  hover:z-0 w-full bg-gray-200 hover:translate-y-2  duration-300 hover:bg-gray-300 hover:shadow-xl">
               <div class="px-3 py-5">
                    <a href="#" class=" text-3xl font-bold text-yellow-600  capitalize">
                     event
                    </a>
               </div>
                <hr class="w-52 border border-gray-700 ml-10">
                 <h1 class="text-4xl text-gray-100 font-semibold float-right bg-yellow-600 h-20 w-20 text-center shadow-md py-4 rounded-full m-3">{{ event_counts }}</h1>
            </div>
            <div class="rounded shadow-md col-span-1 w-full bg-gray-200 hover:translate-y-2 duration-300 hover:bg-gray-300 hover:shadow-xl">
                <div class="p-3 py-5">
                    <a href="#" class=" text-3xl font-bold text-yellow-600  capitalize">
                     mission
                    </a>
                </div>
                <hr class="w-52 border  border-gray-700 ml-10">
                 <h1 class="text-4xl text-gray-100 font-semibold float-right bg-yellow-600 h-20 w-20 text-center shadow-md py-4 rounded-full m-3"> {{ mission_counts }}</h1>
            </div>
            <div class="rounded-md shadow-md  w-full col-span-1 bg-gray-200 hover:translate-y-2 duration-300 hover:bg-gray-300 hover:shadow-xl">
               <div class="px-3 py-5">
                    <a href="#" class=" text-3xl font-bold text-yellow-600  capitalize">
                     testimonies
                    </a>
               </div>
                <hr class="w-52 border border-gray-700 ml-10">
                <h1 class="text-4xl text-gray-100 font-semibold float-right bg-yellow-600 h-20 w-20 text-center shadow-md py-4  rounded-full m-3"> {{ testimony_counts }}</h1>
            </div>

        </div>

        <!-- <div class="">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <main class=" font-bold text-3xl text-blue-600"> -->
                        <!-- Welcome to Dashboard
                    </main> -->
                    <!-- <div class="items-center gap-4 shadow-md rounded-lg my-4 border-l-4 border-yellow-600 px-5"  v-for="(post, i) in posts" :key="i" :value="post.id">
                        {{ post.id }}
                    </div>
                </div>
            </div> -->
        <!-- </div> -->
    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
    // import Welcome from '@/Jetstream/Welcome.vue'
    import axios from 'axios'

    export default defineComponent({
        components: { AppLayout },
         
        data(){
            return {
                event_counts:'',
                mission_counts:'',
                testimony_counts:'',
            }
        },
        methods: {
            // getting event count
            fetchcount_event(){
                axios.post(route('api.count.event'))
                .then((res) => {
                    this.event_counts = res.data
                })
                .catch((ex) => {
                    console.log(ex);
                })
            },

            // getting mission count
            fetchcount_mission(){
                axios.post(route('api.mission.post'))
                .then((res) => {
                    this.mission_counts = res.data
                })
                .catch((ex) => {
                    console.log(ex);
                })
            },
            // getting testimony count
            fetchcount_testimony(){
                axios.post(route('api.count.testimony'))
                .then((res) => {
                    this.testimony_counts = res.data
                })
                .catch((ex) => {
                    console.log(ex);
                })
            },
            // fetchPost(){
            //     axios.post(route('api.fetch.post.mission.count'))
            //     .then((res) => {
            //         this.posts = res.data
            //     // this.count = this.posts.length;

            //     })
            //     .catch((ex) => {
            //         console.log(ex);
            //     })
            // },
        },
        mounted(){
        
            this.fetchcount_event();
            this.fetchcount_mission();
            this.fetchcount_testimony()

        },
        
    })
</script>
