<template>
  <web-layout title="Home">
    <!-- <template #page_head>
            <header class="bg-white text-gray-900">
                <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 py-3">
                    <div>
                        <h2 class="text-xl">
                            Home
                        </h2>
                    </div>

                    <div class="text-right hidden md:block">
                        <span class="text-sm">
                            Home 
                        </span>
                    </div>
                </div>
            </header>
        </template> -->

    <div>
      <!-- site banner -->
       <Splide :options="options" >
          <SplideSlide class="relative bg-gray-700 banner-home" >
            <img src="images/prayer.jpg" alt=" not found" srcset="" class=" w-full"  style="height:100vh">
          </SplideSlide>
           <SplideSlide  >
            <img src="images/prayer2.jpg" alt="" srcset="" class="w-full" style="height:100vh">
          </SplideSlide>
          <div class=" absolute left-4 md:left-20 text-white md:max-w-2xl top-52 " >
            <h1 class="font-bold uppercase text-xl mb-6">Our Mission</h1>
            <h1   class="font-bold text-5xl md:text-6xl lg:text-7xl font-serif mb-6" >
              is to glorify God and loving <i>others</i>
            </h1>
            <Link :href="route('about')" class=" con-btn uppercase  bg-yellow-600 text-white  font-bold  px-16  py-3 border-2 border-yellow-600  hover:bg-gray-50  hover:text-yellow-600  hover:transition duration-500  rounded  " >
              ministry
            </Link>
          </div>
        </Splide>
      <div >
        <div class=" absolute left-4 md:left-20 text-white md:max-w-2xl top-52 " >
          <h1 class="font-bold uppercase text-xl mb-6">Our Mission</h1>
          <h1   class="font-bold text-5xl md:text-6xl lg:text-7xl font-serif mb-6" >
            is to glorify God and loving <i>others</i>
          </h1>
          <Link :href="route('about')" class=" con-btn uppercase  bg-yellow-600 text-white  font-bold  px-16  py-3 border-2 border-yellow-600  hover:bg-gray-50  hover:text-yellow-600  hover:transition duration-500  rounded  " >
            ministry
          </Link>
        </div>
      </div>

      <!-- small banner -->
      <div class="bg-yellow-600">
        <div class="mx-auto max-w-7xl">
          <div class="md:grid grid-cols-2">
            <div class="col-span-1 px-4 py-14">
              <h1 class="text-white text-4xl font-bold mb-4">
                Need Prayer? We’ll Pray For You!
              </h1>
              <h1 class="text-white text-sm">
                Need prayer? We would love to pray for you. You can send us a
                message for prayer.
              </h1>
            </div>
            <div class="col-span-1 py-20 text-center">
              <Link :href="route('contact')"
                class=" con-btn  uppercase bg-yellow-600 rounded  text-white tracking-widest font-semibold px-14  py-5  border-2 border-gray-50 hover:border-yellow-600  hover:bg-yellow-600 hover:text-gray-50 hover:transition duration-500">
                send us a message
              </Link>
            </div>
          </div>
        </div>
      </div>

      <!-- the church -->
      <div class="bg-white">
        <div class="mx-auto max-w-5xl py-28 px-8 lg:px-0">
          <h1
            class=" font-bold tracking-widest uppercase text-yellow-600 text-center text-md  mb-6 ">
            the church
          </h1>
          <h1
            class="font-bold text-gray-800 text-3xl md:text-4xl lg:text-5xl font-serif mb-6 text-center">
            We are a church that believes in Jesus & loves God and people
          </h1>
          <h2 class="text-yellow-600 text-xl font-bold text-center mb-6">
            __________
          </h2>
          <h1 class="font-bold text-gray-500 text-md font-serif text-center">
            We are a church that believes in Jesus, a church that loves God and
            people. Overwhelmed by the gift of salvation we have found in Jesus,
            we have a heart for authentic worship, are passionate about the
            local church, and are on mission to see God’s kingdom established
            across the earth. We are a church that believes in Jesus, a church
            that loves God and people.
          </h1>
        </div>
      </div>

      <!-- the Mission -->
      <div class="">
        <div class="mx-auto max-w-5xl py-28 px-8 lg:px-0">
          <h1
            class="font-bold tracking-widest uppercase text-yellow-600 text-center text-md mb-6">
            what we do
          </h1>
          <h1
            class="font-bold text-gray-800 text-3xl md:text-4xl lg:text-5xl font-serif mb-6 text-center ">
            Our Mission
          </h1>
          <center><hr class="border border-yellow-600 w-20 mb-6" /></center>

          <div class="md:grid grid-cols-3 gap-8">
            <div class="shadow_mission rounded overflow-hidden  col-span-1 mt-16" v-for="(post, i) in posts" :key="i" :value="post.id">
              <div class="bg-gray-500 mb-3">
                <!-- <div class=" bg-gray-600 text-yellow-600 w-full h-full z-50 cover_img">Hello</div> -->
                <img :src="'storage/img_mission/'+ post.image " alt="" srcset="" class=" w-full h-72">
              </div>
              <div class="px-4 pb-5">
                <h1 class="font-bold text-gray-700 text-2xl capitalize font-serif mb-2 text-yellow-600 hover:transition-all duration-500">
                   {{ post.title }}
                </h1>
                <h1 class="font-semibold text-justify text-gray-700 text-sm font-serif">
                  {{ post.content }}
                </h1>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- the Events -->
      <div class="bg-white">
        <div class="mx-auto max-w-5xl py-28 px-8 lg:px-0">
          <h1
            class=" font-bold tracking-widest uppercase text-yellow-600 text-center text-md mb-6">
            calendar
          </h1>
          <h1
            class=" font-bold text-gray-800 text-3xl md:text-4xl  lg:text-5xl font-serif  mb-6 text-center">
            Upcoming Events
          </h1>
          <center><hr class="border border-yellow-600 w-20 mb-6" /></center>
          <div class="md:grid grid-cols-3 gap-8 ">
            <div
              class="shadow_event rounded overflow-hidden  col-span-1 mt-16 "
              v-for="(event, i) in events"
              :key="i"
              :value="event.id"
             >
              <!-- <Link :href="'/view/' + event.id">\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
              <Link :href="route('viewpost', event.id)">
                <div class="bg-gray-500 mb-8">
                  <!-- <div class=" bg-gray-600 text-yellow-600 w-full h-full z-50 cover_img">Hello</div> -->
                   <img :src="'storage/img_event/'+ event.image " alt="" srcset=""  class="object-cover w-full img_c h-72" >
              </div>
              
                <h1
                  class=" p-2 capitalize font-bold text-gray-800 text-xl  font-serif text-yellow-600 hover:transition-all duration-500" >
                  {{ event.title }}
                </h1>
             
                <h1
                  class=" p-2 font-bold  tracking-wide text-right text-gray-700 text-sm ">
                  <strong class="text-sm capitalize">date :</strong> {{ event.pdate }}
                </h1>
              </Link>
            </div>
          </div>
        </div>
      </div>

      <!-- Testimomies -->
      <div class=" bg-gray-700 banner-test" :style="{ 'background-image': 'url(images/prayer12.jpg)' }" >
        <!-- <div class="banner-testi z-40 absolute top-0 bg-gray-900 "></div> -->
        <!-- <div class="overlay banner-home absolute top-0"></div> -->
        <div class="mx-auto max-w-5xl py-28 px-8 lg:px-0">
          <h1
            class="font-bold tracking-widest  uppercase text-yellow-600 text-center text-md mb-6">
            testimonials
          </h1>
          <h1
            class="font-bold text-gray-50 text-3xl  md:text-4xl lg:text-5xl  font-serif  mb-6 text-center ">
            People’s Stories
          </h1>
          <center><hr class="border border-yellow-600 w-20 mb-8" /></center>
            <Splide  :options="options1">
              <SplideSlide v-for="(testimony, i) in testimonies" :key="i" :value="testimony.id">
              <div class="md:grid grid-cols-2 gap-8 bg-gray-900 bg-opacity-40 p-6"  >
                <div class="col-span-1">
                  <div class="text-white">
                    <span class="text-2xl capitalize">{{ testimony.subject }}</span>&nbsp;
                    
                  </div>

                  <div class="text-gray-200 mt-6 text-justify">
                      {{ testimony.content }}
                      <div class="text-gray-200 capitalize mt-3 font-semibold ">testifier : <span class="font-bold">{{ testimony.fullname }}</span></div>
                  </div>
                </div>
                <div class="">
                  <img :src="'storage/img_testimony/'+ testimony.image " alt="" class=" h-72 w-full img_c" />
                </div> 
              </div>
              </SplideSlide>
            </Splide>
            
        </div>
      </div>
    </div>
  </web-layout>
</template>

<script>
import { Splide, SplideSlide } from '@splidejs/vue-splide';
import { defineComponent } from 'vue';
import '@splidejs/splide/dist/css/themes/splide-default.min.css';
import WebLayout from "../Layouts/WebLayout.vue";
import { Link, Head } from "@inertiajs/inertia-vue3";
import axios from "axios";

export default {
  components: { WebLayout, Link,Head, Splide, SplideSlide },
  data() {
    return {
      posts: [],

      events: [],

      testimonies:[],
      // slider for welcome page
      options: {
        rewind:true,
        // gap : '1rem',
        autoplay: true,
        rewindSpeed: 2000,
        type:"loop",
        arrows: false,
        // pagination:false
      },
// slider for testimony
       options1: {
        rewind:true,
        // gap : '1rem',
        autoplay: true,
        rewindSpeed: 2000,
        type:"loop",
        arrows: false,
        // pagination:false
      },
     
    };
  },


  methods: {
    fetchPostmission() {
      axios
        .post(route("api.fetch.post.mission"))
        .then((res) => {
          this.posts = res.data;
        })
        .catch((ex) => {
          console.log(ex);
        });
    },

    fetchPostevent() {
      axios
        .post(route("api.fetch.post.event"))
        .then((res) => {
          this.events = res.data;
        })
        .catch((ex) => {
          console.log(ex);
        });
    },

    fetchTestimony(){
      axios.post(route('api.fetch.testimony.once'))
        .then((res) => {
            this.testimonies = res.data
        })
        .catch((ex) => {
            console.log(ex);
        })
      },
  },
  mounted() {
    this.fetchPostmission();
    this.fetchPostevent();
    this.fetchTestimony();
  },
};
</script>

<style>
.banner-test{
   background-position: center;
   background-size: cover;
}
.banner-home {
  height: 39.9rem;
  background-position: center;
  background-size: cover;
}

.con-btn:hover {
  box-shadow: 4px 8px 8px hsl(0deg 10% 10% / 0.38);
}

.shadow_event {
  box-shadow: 2px 4px 4px hsl(0deg 10% 10% / 0.38);
}

.shadow_event:hover {
  box-shadow: 4px 8px 8px hsl(0deg 10% 10% / 0.38);
}

.shadow_mission {
  box-shadow: 2px 4px 4px hsl(0deg 10% 10% / 0.38);
}

.shadow_mission:hover {
  box-shadow: 4px 8px 8px hsl(0deg 10% 10% / 0.38);
}

.img_c{
  background-position: center top;
}
</style>
