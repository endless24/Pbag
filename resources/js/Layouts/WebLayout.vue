<template>
  <Head :title="title" />
    <div>
        <!-- Header -->
        <slot name="page_head"></slot>
        <!-- Navbar -->
        <navbar></navbar>

        <div class=" bg-gray-100">
          <slot></slot>
        </div>
        <!-- Footer -->
        <footer-component></footer-component>
    </div>
</template>

<script>
import FooterComponent from '../Pages/Includes/Footer.vue'
import Navbar from '../Pages/Includes/Navbar.vue'
import { Head, Link } from '@inertiajs/inertia-vue3';
export default {
  components: { Navbar,Head, Link, FooterComponent },
  props:{
    // canPost:Boolean
  }
}
</script>