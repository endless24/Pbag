<template>
    <web-layout title="About">
        <!-- card about the church -->
        <div class=" bg-white rounded overflow-hidden  ">
            <div class="h-52 mx-auto max-w-7xl rounded-b overflow-hidden" :style="{'background-image':'url(images/top.jpg)', 'background-size':'cover','background-position':'right'}">
              <h1 class="text-4xl font-bold font-serif capitalize pl-24 pt-16 text-white ">about - us</h1>
            </div>
            <div class=" mt-10">
                <div class=" lg:p-20 p-10 mx-auto max-w-7xl grid grid-cols-1 md:grid-cols-2">
                    <div class="col-span-1 lg:px-5 ">
                        <div class="text-md font-mono gap-4 tracking-wide font-bold text-yellow-600 mb-6 uppercase">the church</div>
                        <div class="lg:text-5xl text-3xl text-gray-700 text-justify font-bold">
                            We are a church that believes in Jesus & loves God and people
                            <hr class="border-yellow-600 border w-20 my-8">
                        </div>
                        <div class="text-md text-justify text-gray-700 lg:mb-0 mb-4">
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                             Adipisci voluptas ipsum maiores recusandae in voluptatibus 
                            quia reprehenderit fugiat dolorum, neque nulla debitis! Ea 
                            commodi amet deserunt? Nulla error rem maiores.
                            orem, ipsum dolor sit amet consectetur adipisicing elit.
                             Adipisci voluptas ipsum maiores recusandae in voluptatibus 
                            quia reprehenderit fugiat dolorum, neque nulla debitis! Ea 
                            commodi amet deserunt? Nulla error rem maiores.</p>
                        </div>
                    </div>
                    <div class="col-span-1">
                        <img src="images/prayer2.jpg" alt="" class=" h-full" >
                    </div>
                </div>
            </div>
            <!-- card about the pastor -->
            <div class="text-center font-bold text-gray-700 text-3xl py-4 capitalize">
                the prophet
            </div>
            <center> <hr class="border border-yellow-600 w-14 text-center "></center>
            
            <div class="">
                <div class=" lg:p-20 p-10 mx-auto max-w-7xl grid grid-cols-1 md:grid-cols-2">
                    <div class="col-span-1 rounded overflow-hidden ">
                         <img src="images/Capture.png" alt="" class=" h-full float-right" >
                    </div>
                    <div class="col-span-1 lg:mt-0 mt-4 lg:px-5">
                        <div class="text-md font-mono gap-4 tracking-wide font-bold text-yellow-600  uppercase">
                            prophet chinedu Nwankwo
                        </div>
                         <hr class="border-gray-700 border w-20 my-4">
                        <div class=" text-gray-700  text-justify ">
                            <p class="mb-4 lg:text-xl font-semibold">
                                 The darkeness that mascamoth the light.
                                The stone a rasterman will throw that will bring a bad feelings 
                                to the wicked man. The stoper and destroyer of the natural mystic 
                                 projected  by the evil one's. The man that will emasipate you from 
                                 mental selvery. Nwanwa Nwanwa Nwanwa Ngeneagu ogburuto Alias     
                                oji chineke the staff of  God. Nwabuwannechinedu Alias chindiozo other God's,
                                Prophet ogi chineke Alias Anagwu ornere
                            </p>

                            <p>
                                My God can solve all problems (Spritual  and mental problems) such as deat,
                                blindness,cripleness, dumb, strocko, family curse,barrinness jobless purvaty,
                                marin attached,spritual wife or husband, assessrer curse, etc My can solve all
                                this problems,if only you will have faith like mustard seed, an upserve spritual 
                                exercise, such as pain your thith, given your seed of Faith,given your family support.
                                The sky will be your limit. Imporsibility will be nothing before you. This is what my God promised.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </web-layout>
</template>

<script>
import WebLayout from '../Layouts/WebLayout.vue';
import { usePage,Head } from "@inertiajs/inertia-vue3";

export default {
  components: { WebLayout,Head },
  data(){
      return {

    }
  }

}
</script>

<style>
.banner-home{
    height: 39.9rem;
    background-position: center;
}

.con-btn:hover{
    box-shadow: 4.0px 8.0px 8.0px hsl(0deg 10% 10% / 0.38);
}
</style>
