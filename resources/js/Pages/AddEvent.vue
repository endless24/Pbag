<template>
    <app-layout title="Event">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                AddPost
            </h2>
        </template>


   
        <div class="">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 rounded">
                <h1 class="text-3xl text-yellow-600"><font-awesome :icon="['far', 'edit']" /> Create Post For Event</h1>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="md:col-span-2 ">
                        <form name="frmPost" @submit.prevent="addPostEvent()" enctype="multipart/form-data">
                            <div class="items-center gap-4 shadow-md rounded-lg my-4 border-l-4 border-yellow-600 px-5">
                                <div class="mb-3">
                                    <label for="" class="capitalize block">Event Name</label>
                                    <input type="text" :class="inputClass" id="inputshadow" v-model="form.title" required>
                                </div>
                                <!-- <div class="mb-3">
                                    <label for="" class="capitalize block">Event Category</label>
                                    <select :class="inputClass" id="inputshadow" v-model="event.category_id">
                                        <option value="" selected disabled>Select Product Category</option> -->
                                        <!-- <option v-for="(cat, i) in categories" :key="i" :value="cat.id"> {{ cat.category }} </option> -->
                                        <!-- <option v-for="(cat, i) in categories" :key="i" :value="cat.id"> {{ cat.category }} </option>
                                    </select>
                                </div> -->
                                <div class="mb-3">
                                    <label for="" class="capitalize block">Add Image</label>
                                    <input type="file" name="picture" class="pt-3 px-3" @input="form.image = $event.target.files[0]" :class="inputClass" required >
                                    <!-- <input type="text" :class="inputClass" v-model="post.image"> -->
                                </div>
                                <div class="mb-3">
                                    <label for="" class="capitalize block">Event Date</label>
                                    <input type="date" placeholder="" :class="inputClass" id="inputshadow" v-model="form.pdate" required>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="capitalize block">Event Detail</label>
                                    <textarea :class="inputClass" class=" h-32 resize-none" id="inputshadow" v-model="form.content"></textarea>
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
                                    <p>recent post</p>
                                </div>
                            </div>
                            <div class="py-3 rounded-xl border grid grid-cols-4 gap-4 my-4 p-2 shadow-md" v-for="(event, i) in events" :key="i" :value="event.id">
                                <div class="col-span-1 overflow-hidden  rounded-lg  bg-cover">
                                   <img :src="'storage/img_event/'+ event.image " alt="" srcset="" >
                                </div>
                                <div class="col-span-3  text-gray-800 flex justify-between items-center w-full h-full">
                                    <div>
                                        <p class="text-lg capitalize font-bold">{{ event.title }}</p>
                                        <div class="flex">
                                            <!-- <p>{{ post.content }} </p>  -->
                                            <p class="text-sm ml-2 font-bold text-opacity-20 cursor-pointer">Read more ...</p>
                                        </div>
                                    </div>
                                    <div class="text-red-600 cursor-pointer" @click="deleteEvent(event.id)">
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

             form : this.$inertia.form({
                    title: '',
                    image: '',
                    pdate: '',
                    content: '',
                }),
            events: [],
        }
    },
    methods: {
        
        addPostEvent(){
            let data = new FormData();
            data.append('title',this.form.title)
            data.append('image',this.form.image)
            data.append('pdate',this.form.pdate)
            data.append('content',this.form.content)
            axios.post(route('api.store.event'), data)
            .then((response)=>{
                if (response.data.status == 'success') {
                    alert(response.data.msg)
                }
                if (response.data.code == 200) {
                    alert(response.data.msg)
                    this.form='';
                    this.fetchEvent();
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

        fetchEvent(){
            axios.post(route('api.fetch.event'))
            .then((res) => {
                this.events = res.data
            })
            .catch((ex) => {
                console.log(ex);
            })
        },

        deleteEvent(id){
            if (confirm('are you sure you want to delete ?')) {
                axios.post(route('api.delete.event'), {id: id})
                .then((res) =>{
                    if(res.data.code == 200){
                        alert(res.data.msg)
                        this.fetchEvent()
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
        this.fetchEvent();

    }
}
</script>

<style>
#inputshadow{
    box-shadow: 2.0px 4.0px 4.0px hsl(0deg 10% 10% / 0.34);
}
</style>