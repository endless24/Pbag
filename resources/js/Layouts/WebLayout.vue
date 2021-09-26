<template>
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
export default {
  components: { Navbar, FooterComponent },
  props:{
    // canPost:Boolean
  }
}
</script>