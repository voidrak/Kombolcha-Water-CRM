<script setup>
import Heading from '@/components/Guest/Heading.vue';
import Footer from '@/components/Guest/Footer.vue';


</script>

<template>
  <div class="">
    <Heading />
    <slot></slot>

    <Footer />
  </div>
</template>