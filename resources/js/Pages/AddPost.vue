<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                AddPost
            </h2>
        </template>


   
        <div class="w-full">
            <div class="max-w-6xl mx-auto rounded">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="md:col-span-2 ">
                        <form name="frmPost" @submit.prevent="addPost()">
                            <div class="items-center gap-4 shadow-lg rounded-lg my-4 border px-5">
                                <div class="mb-3">
                                    <label for="" class="capitalize block">Post Title</label>
                                    <input type="text" :class="inputClass" v-model="post.title">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="capitalize block">Add Image</label>
                                    <input type="text" :class="inputClass" v-model="post.image">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="capitalize block">Post Content</label>
                                    <textarea :class="inputClass" v-model="post.content"></textarea>
                                </div>
                                <div>
                                    <button :class="addBtn">
                                        Add
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div>
                        
                        <!-- Recent post -->
                        <div>
                            <div class="w-full bg-blue-900 rounded-lg shadow-lg border">
                                <div class="w-11/12 h-10 text-gray-50 font-bold text-lg flex items-center mx-auto capitalize">
                                    <p>recent post</p>
                                </div>
                            </div>
                            <div class="h-20 rounded-xl border grid grid-cols-4 gap-4 my-4 p-2 shadow-lg" v-for="(post, i) in posts" :key="i" :value="post.id">
                                <div class="col-span-1 overflow-hidden bg-gray-500 rounded-lg">
                                    
                                </div>
                                <div class="col-span-3 text-gray-800 flex justify-between items-center w-full h-full">
                                    <div>
                                        <p class="text-lg capitalize font-bold">{{ post.title }}</p>
                                        <div class="flex">
                                            <p>{{ post.content }} </p> 
                                            <p class="text-sm ml-2 font-bold text-opacity-20 cursor-pointer">Read more ...</p>
                                        </div>
                                    </div>
                                    <div class="text-red-600 cursor-pointer" @click="deletePost(post.id)">
                                        <font-awesome :icon="['far', 'trash-alt']"/>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>




    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue'    
import axios from 'axios'
export default {
    components: { AppLayout },
    data(){
        return {
            inputClass:'border-blue-600 border-opacity-20 border-2 rounded outline-none focus:outline-none ring-1',
            addBtn: 'px-3 bg-gray-900 text-white rounded shadow-md hover:bg-blue-900',

            post: {
                title: '',
                image: '',
                content: '',
            }, 
            posts: [],
        }
    },
    methods: {
        
        addPost(){
            axios.post(route('api.store.post'), {post: this.post})
            .then((response)=>{
                if (response.data.code == 200) {
                    alert(response.data.msg)
                    this.fetchPost()
                }
                if(res.data.code == 500) {
                    alert(response.data.msg)
                }
            })
            .catch((ex)=>{
                console.log(ex);
            })
        },

        fetchPost(){
            axios.post(route('api.fetch.post'))
            .then((res) => {
                this.posts = res.data
            })
            .catch((ex) => {
                console.log(ex);
            })
        },

        deletePost(id){
            if (confirm('are you sure you want to delete ?')) {
                axios.post(route('api.delete.post'), {id: id})
                .then((res) =>{
                    if(res.data.code == 200){
                        alert(res.data.msg)
                    }
                    if(res.data.code == 500){
                        alert(res.data.msg)
                    }
                })
            }else{
                alert('Post is safe')
            }
        }

    },
    mounted(){
        this.fetchPost();
    }
}
</script>

<style>

</style>