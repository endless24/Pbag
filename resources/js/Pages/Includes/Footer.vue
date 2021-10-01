
<template>
  <div class="py-12 text-white" style="background: #444">
    <div class="container max-w-5xl mx-auto">
      <div class="grid md:grid-cols-3">
        <div class="text-center md:text-left px-4 py-4 col-span-1 text-3xl">
          <span class="py-3 rounded-full cursor-pointer">
            <span
              class="
                bg-yellow-600
                text-white
                px-3
                py-3
                text-2xl
                rounded-full
                font-semibold
              "
              id="hword1"
            >
              <i>GTC</i>
            </span>
            <i class="text-yellow-600"></i>
            <span class="text-gray-300 py-3 hword">Church</span>
          </span>
          <span class="text-sm text-gray-300 mt-6 block">
            God's Time Christian Church &copy;{{ new Date().getFullYear() }} All
            rights reserved.
          </span>
          <div class="text-center md:text-left mt-4">
            <span class="text-2xl text-yellow-600 block mb-2">
              <font-awesome :icon="['fas', 'map-signs']" /> &nbsp;
              <span class="text-center md:text-left text-xl text-gray-300"
                >Address</span
              >
            </span>
            <span class="text-sm text-gray-300 text-center md:text-left block">
              <span class=""
                >No 18 Ogbudike Street Okpoko Onitsha, Anambra State, Nigeria.
              </span>
            </span>
          </div>
        </div>

        <div class="col-span-1 text-center px-4 py-4 text-xl mt-4 md:mt-0">
          <div class="grid grid-cols-2">
            <div class="col-span-1 text-2xl text-yellow-600">
              <font-awesome :icon="['fas', 'phone']" />
            </div>
            <div class="text-sm text-gray-300 text-justify">
              <a href="tel:+2349130720457" class="block hover:text-yellow-600"
                >+2349130720457</a
              >
              <a
                href="tel:+2347047100834"
                class="block mt-0.5 hover:text-yellow-600"
                >+2347047100834</a
              >
              <a
                href="tel:+2348179827656"
                class="block mt-0.5 hover:text-yellow-600"
                >+2348179827656</a
              >
            </div>
          </div>
          <div class="grid grid-cols-2 mt-2">
            <div class="col-span-1 text-2xl text-yellow-600">
              <font-awesome :icon="['fas', 'envelope']" />
            </div>
            <div class="text-sm text-gray-300 text-justify">
              <a
                href="mailto:cnwankwo211@gmail.com"
                class="block hover:text-yellow-600"
                >cnwankwo211@gmail.com</a
              >
            </div>
          </div>
          <div class="grid grid-cols-2 mt-3">
            <div class="col-span-1 text-2xl text-yellow-600">
              <font-awesome :icon="['far', 'building']" />
            </div>
            <div class="text-sm text-gray-300 text-justify">
              <span class="block text-lg">Zenith Bank</span>
              <span class="block mt-0.5">2001110407</span>
              <span class="block mt-0.5">Chinedu Nwankwo</span>
            </div>
          </div>
        </div>

        <div class="text-center px-4 py-4 text-xl mt-4 md:mt-0">
          <a href="" id="hword1" :class="social" class="px-5 py-3">
            <font-awesome :icon="['fab', 'facebook-f']" />
          </a>
          <a href="" id="hword1" :class="social" class="px-4 py-3">
            <font-awesome :icon="['fab', 'whatsapp']" />
          </a>
          <a href="" id="hword1" :class="social" class="px-4 py-3">
            <font-awesome :icon="['fab', 'instagram']" />
          </a>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { onMounted } from "@vue/runtime-core";
export default {
  data() {
    return {
      social:
        "mx-2 rounded-full bg-yellow-600 cursor-pointer hover:bg-gray-500 hover:transition duration-500 hover:text-lg",
    };
  },
};
</script>

<style>
#hword1 {
  box-shadow: 2px 4px 4px hsl(0deg 10% 10% / 0.36);
}

.hword {
  text-shadow: 2px 4px 4px hsl(0deg 10% 10% / 0.3);
}
</style>