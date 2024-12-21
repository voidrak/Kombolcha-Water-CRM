<script setup>
import Logo from '@/ui/Logo.vue';
import { useAuthStore } from "@/stores/auth";


const authStore = useAuthStore();

</script>

<template>
  <header>
    <nav class="flex items-center border-b border-gray-300 justify-between p-6 container mx-auto">
      <!-- Logo -->
      <Logo />

      <!-- Menu items -->
      <div class="text-base text-gray-900 hidden lg:flex">
        <RouterLink :to="{ name: 'Home' }" class="block font-bold mt-4 lg:inline-block   lg:mt-0 mr-10">
          Home
        </RouterLink>
        <div class="relative font-[sans-serif] w-max mx-auto group">
          <button type="button" id="dropdownToggle" class="block font-bold mt-4 lg:inline-block   lg:mt-0 mr-10">
            Services
            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 fill-black inline ml-3" viewBox="0 0 24 24">
              <path fill-rule="evenodd"
                d="M11.99997 18.1669a2.38 2.38 0 0 1-1.68266-.69733l-9.52-9.52a2.38 2.38 0 1 1 3.36532-3.36532l7.83734 7.83734 7.83734-7.83734a2.38 2.38 0 1 1 3.36532 3.36532l-9.52 9.52a2.38 2.38 0 0 1-1.68266.69734z"
                clip-rule="evenodd" data-original="#000000" />
            </svg>
          </button>

          <ul id="dropdownMenu"
            class='w-0  h-0   transition-all duration-200 ease-linear  block right-2    absolute shadow-lg border border-gray-100 bg-white group-hover:py-2 z-[1000] group-hover:min-w-full group-hover:w-max rounded group-hover:h-[150px] overflow-hidden'>
            <RouterLink :to="{ name: 'OrderMaintenance' }">
              <li class='py-2.5 px-5 hover:bg-light-blue text-black text-sm cursor-pointer'>Order Maintenance
              </li>
            </RouterLink>
            <RouterLink :to="{ name: 'SubmitFeedback' }">
              <li class='py-2.5 px-5 hover:bg-light-blue text-black text-sm cursor-pointer'>Give Feedback</li>
            </RouterLink>
            <RouterLink :to="{ name: 'UserBill' }">
              <li class='py-2.5 px-5 hover:bg-light-blue text-black text-sm cursor-pointer'>View Bill</li>
            </RouterLink>

          </ul>
        </div>
        <RouterLink :to="{ name: 'Vacancy' }"
          class="block font-bold mt-4 lg:inline-block hover:text-gray-700 lg:mt-0 mr-10">
          Vacancy
        </RouterLink>
        <RouterLink :to="{ name: 'AboutUs' }"
          class="block font-bold hover:text-gray-700 mt-4 lg:inline-block lg:mt-0 mr-10">
          About us
        </RouterLink>

      </div>

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
        <div class="block lg:hidden">
          <button class="flex items-center px-4 py-3 border focus:outline-none">
            <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <title>Menu</title>
              <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
            </svg>
          </button>
        </div>
      </div>
    </nav>


  </header>
</template>