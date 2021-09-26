<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                AddCategory
            </h2>
        </template>

   
        <div class="">
            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 rounded">
                <h1 class="text-3xl text-yellow-600"><font-awesome :icon="['fas', 'plus']" /> Add Category</h1>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="md:col-span-2 ">
                        <form name="frmCategory" @submit.prevent="addCategory()">
                            <div class="items-center gap-4 my-4 rounded-lg shadow-md border-l-4 border-yellow-600  px-5 py-3">
                                <div class="mb-3">
                                    <label for="" class="capitalize block">Category</label>
                                    <input type="text" v-model="category" :class="inputClass" id="inputshadow" required>
                                </div>
                                <div>
                                    <button type="submit" :class="addBtn">
                                        Add
                                        <font-awesome :icon="['fas', 'plus']" />
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div>
                        <!-- Recent Category -->
                        <div class="border-l-4 border-gray-600 rounded-lg">
                            <div class="w-full rounded-lg">
                                <div class="w-11/12 h-10 text-yellow-600 font-bold text-lg flex items-center mx-auto capitalize">
                                    <p>recent category</p>
                                </div>
                            </div>
                            <div class="h-20 rounded-xl border flex items-center gap-4 my-4 px-3 shadow-md" v-for="(cat, i) in categories" :key="i" :value="cat.id">
                                <div class="w-full text-gray-800 text-lg font-semibold flex justify-between">
                                    <div>
                                        <p>{{ cat.category }}</p>
                                    </div>
                                    <div class="self-end">
                                        <button  type="button"  @click="deleteCat(cat.id)" class="focus:outline-none focus:border-0 text-red-600">
                                            <font-awesome :icon="['far', 'trash-alt']"/>
                                        </button>
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
            category:'',
            categories:[],

            inputClass:'border-blue-600 border-opacity-20 border-0 bg-gray-200 rounded h-12 lg:w-96 w-64',
            addBtn: 'px-2 py-2 mb-4 bg-gray-700 text-white rounded shadow-md hover:bg-blue-900',

        }
    },
    methods: {
        addCategory(){
            axios.post(route('api.store.category'), { cat: this.category})
            .then((res) => {
                if (res.data.status == 'success') {
                    alert(res.data.msg)
                    this.category = '';
                    this.fetchCategory();
                } else {
                    alert(res.data.msg)
                }
            })
            .catch((ex) => {
                console.log(ex);
            })
        },
        fetchCategory(){
            axios.post(route('api.fetch.category'))
            .then((res) => {
                this.categories = res.data
            })
            .catch((ex) => {
                console.log(ex);
            })
        },
        deleteCat(cat){
            if (confirm('Are sure you want to delete ?')) {
                axios.post(route('api.delete.category'), {cat: cat})
                .then((res)=>{
                    if(res.data.code == 200){
                        alert(res.data.msg)
                        this.fetchCategory()
                    } 
                    if(res.data.code == 500) {
                        alert (res.data.msg)
                    }
                })
                .catch((ex) => {
                    console.log(ex);
                })
            }else{
                alert('Category was not delete')
            }
        },

    },
    mounted(){
        this.fetchCategory();
    }
}
</script>

<style>
#inputshadow{
    box-shadow: 2.0px 4.0px 4.0px hsl(0deg 10% 10% / 0.34);
}
</style>