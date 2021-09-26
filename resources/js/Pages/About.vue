<template>
    <web-layout>
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
            <div>
                ABOUT US
            </div>
        </div>



    </web-layout>
</template>

<script>
import WebLayout from '../Layouts/WebLayout.vue';
import { usePage } from "@inertiajs/inertia-vue3";

export default {
  components: { WebLayout },
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
