<script setup>
import Logo from '@/ui/Logo.vue';
import { useAuthStore } from "@/stores/auth";
import MaintenanceHeading from '@/components/Maintenance/MaintenanceHeading.vue';


const authStore = useAuthStore();

</script>

<template>
  <header>
    <nav class="flex items-center justify-between p-6 container mx-auto">
      <!-- Logo -->
      <Logo />

      <!-- Menu items -->
      <h1 class="text-4xl text-light-blue font-bold">Maintenance Request Page</h1>
      <!-- CTA and Hamburger icon -->
      <div class="flex items-center">
        <div v-if="!authStore.user" class="mr-5 lg:mr-0">
          <RouterLink :to="{ name: 'Login' }">
            <button class="font-bold py-2 px-6 text-gray-600 hover:text-gray-700 text-base hidden lg:inline-flex">
              Login
            </button>
          </RouterLink>
          <RouterLink :to="{ name: 'Register' }">
            <button
              class="hover:bg-dark-blue focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 px-5 py-2 text-base font-medium text-center text-white transition duration-500 ease-in-out transform bg-light-blue">
              Sign up
            </button>
          </RouterLink>
        </div>
        <div v-else class="">
          <form @submit.prevent="authStore.logout" class="">
            <button
              class="hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2  px-5 py-2 text-base font-medium text-center text-white transition duration-500 ease-in-out transform bg-red-500">Log
              out</button>
          </form>
        </div>
      </div>
    </nav>


  </header>
</template>