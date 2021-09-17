<template>
    <div>
        <!-- Header -->
        <slot name="page_head"></slot>
        <!-- Navbar -->
        <navbar></navbar>

        <div class="min-h-screen">
          <slot></slot>
        </div>
        
    </div>
</template>

<script>
import Navbar from '../Pages/Includes/Navbar.vue'
export default {
  components: { Navbar },
  props:{
    // canPost:Boolean
  }
}
</script>