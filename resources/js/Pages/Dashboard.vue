<template>
    <app-layout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <!-- <main class=" font-bold text-3xl text-blue-600">
                        Welcome to Dashboard
                    </main> -->
                    <div class="items-center gap-4 shadow-md rounded-lg my-4 border-l-4 border-yellow-600 px-5"  v-for="(post, i) in posts" :key="i" :value="post.id">
                        {{ post.id }}
                    </div>
                </div>
            </div>
        </div>
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

                
                
                posts: [],

                
            }
        },
        methods: {
            fetchPost(){
                axios.post(route('api.fetch.post.mission.count'))
                .then((res) => {
                    this.posts = res.data
                // this.count = this.posts.length;

                })
                .catch((ex) => {
                    console.log(ex);
                })
            },
        },
        mounted(){
        
            this.fetchPost()

        },
        
    })
</script>
