<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                AddPost
            </h2>
        </template>


   
        <div class="">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 rounded">
                <h1 class="text-3xl text-yellow-600"><font-awesome :icon="['far', 'edit']" /> Create Post For Mission</h1>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="md:col-span-2 ">
                        <form name="frmPost"  @submit.prevent="addPost()">
                            <div class="items-center gap-4 shadow-md rounded-lg my-4 border-l-4 border-yellow-600 px-5">
                                <div class="mb-3">
                                    <label for="" class="capitalize py-3 block">Mission Name</label>
                                    <input type="text" required :class="inputClass" id="inputshadow" v-model="title">
                                </div>
                                <!-- <div class="mb-3">
                                    <label for="" class="capitalize block">Post Category</label>
                                    <select :class="inputClass" id="inputshadow" v-model="post.category_id">
                                        <option value="" selected disabled>Select Product Category</option> -->
                                        <!-- <option v-for="(cat, i) in categories" :key="i" :value="cat.id"> {{ cat.category }} </option> -->
                                        <!-- <option v-for="(cat, i) in categories" :key="i" :value="cat.id"> {{ cat.category }} </option>
                                    </select>
                                </div> -->
                                <!-- <div class="mb-3">
                                    <label for="" class="capitalize block">Add Image</label>
                                    <input type="file" name="picture" :class="inputClass" @change="onFileChange">
                                </div> -->
                                <div class="mb-3">
                                    <label for="" class="capitalize block py-3">Mission Detail</label>
                                    <textarea :class="inputClass" required class=" h-32 resize-none" id="inputshadow" v-model="content" v-on:input="check"></textarea>
                                    <p :class="{help: true, 'text-red-700': remaining==0}">{{instruction}}</p>
                                </div>
                                <div>
                                    <button :class="addBtn">
                                        Add 
                                        <font-awesome :icon="['fas', 'plus']" />
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div>
                        
                        <!-- Recent post -->
                        <div class="border-l-4 border-gray-600 rounded-lg">
                            <div class="w-full rounded-lg">
                                <div class="w-11/12 h-10 text-yellow-600 font-bold text-lg flex items-center mx-auto capitalize">
                                    <p>recent Mission</p>
                                </div>
                            </div>
                            <div class="py-3 rounded-xl border grid grid-cols-4 gap-4 my-4 p-2 shadow-md" v-for="(post, i) in posts" :key="i" :value="post.id">
                                <div class="col-span-1 overflow-hidden bg-gray-500 rounded-lg">
                                    
                                </div>
                                <div class="col-span-3  text-gray-800 flex justify-between items-center w-full h-full">
                                    <div>
                                        <p class="text-lg capitalize font-bold">{{ post.title }}</p>
                                        <div class="flex">
                                            <!-- <p>{{ post.content }} </p>  -->
                                            <p class="text-sm ml-2 font-bold text-opacity-20 cursor-pointer">Read more ...</p>
                                        </div>
                                    </div>
                                    <div class="text-red-600 cursor-pointer" @click="deletePost(post.id)">
                                        <font-awesome :icon="['far', 'trash-alt']"/>
                                    </div>
                                </div>
                            </div>
                                <!-- {{ post.links() }} -->
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

            inputClass:'border-blue-600 border-opacity-20 border-0 bg-gray-200 rounded h-12 lg:w-96 w-64',
            addBtn: 'px-2 py-2 mb-4 bg-gray-700 text-white rounded shadow-md hover:bg-blue-900',
            title: '',
            // image: '',
            content: '',
            posts: [],

             limit: 200, // limiting how many letters to be entered in textarea
             
            
        }
    },
     // limiting how many letters to be entered in textarea
     computed: {
                instruction: function() {  
                return this.content==''?
                'limit: '+this.limit+' characters':
                'remaining '+this.remaining+' characters';      
                },
                remaining: function() {
                return this.limit-this.content.length;
             }
         },

    methods: {
        // limiting how many letters to be entered in textarea
        check: function() {
            this.content = this.content.substr(0, this.limit)
        },
        
        addPost(){
            axios.post(route('api.store.post'), {title: this.title, content: this.content})
            .then((response)=>{
                if (response.data.status == 'success') {
                    alert(response.data.msg)
                }
                if (response.data.code == 200) {
                    alert(response.data.msg)
                    this.title='';
                    this.content='';
                    this.fetchPost();
                    // window.location.reload();
                    this.$Inertia.visit('');
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
                        this.fetchPost()
                    }
                    if(res.data.code == 500){
                        alert(res.data.msg)
                    }
                })
            }else{
                alert('Post is safe')
            }
        },

        
    },
    mounted(){
        this.fetchPost();
    }
}
</script>

<style>
#inputshadow{
    box-shadow: 2.0px 4.0px 4.0px hsl(0deg 10% 10% / 0.34);
}
</style>