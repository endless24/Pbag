<template>
    <web-layout>
        
        <div>
            Post
            
        </div>



    </web-layout>
</template>

<script>
import WebLayout from '../Layouts/WebLayout.vue';
// import Button from '../Jetstream/Button.vue';
// import { usePage } from "@inertiajs/inertia-vue3";
import axios from 'axios'

export default {
  components: { WebLayout },
  data(){
      return {

          post: {
                title: '',
                // image: '',
                content: '',
            }, 
            posts: [],

             event: {
                title: '',
                pdate: '',
                // image: '',
                content: '',
            }, 
            events: [],

    }
  },
  methods : {
      
        fetchPostmission(){
            axios.post(route('api.fetch.post.mission'))
            .then((res) => {
                this.posts = res.data
            })
            .catch((ex) => {
                console.log(ex);
            })
        },

        fetchPostevent(){
            axios.post(route('api.fetch.post.event'))
            .then((res) => {
                this.events = res.data
            })
            .catch((ex) => {
                console.log(ex);
            })
        },
  },
  mounted(){
        this.fetchPostmission();
        this.fetchPostevent();
    }

}
</script>

<style>

</style>
