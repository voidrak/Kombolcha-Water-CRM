<script setup>
import Logo from '@/ui/Logo.vue';


</script>

<template>
  <header>
    <nav class="flex items-center justify-between p-6 container mx-auto">
      <!-- Logo -->
      <Logo />

      <!-- Menu items -->
      <div class="text-base text-gray-900 hidden lg:flex">
        <RouterLink :to="{ name: 'Home' }" class="block font-bold mt-4 lg:inline-block   lg:mt-0 mr-10">
          Home
        </RouterLink>
        <a href="#" class="block font-bold mt-4 lg:inline-block hover:text-gray-700 lg:mt-0 mr-10">
          Services
        </a>
        <a href="#" class="block font-bold mt-4 lg:inline-block hover:text-gray-700 lg:mt-0 mr-10">
          Vacancy
        </a>
        <a href="#" class="block font-bold hover:text-gray-700 mt-4 lg:inline-block lg:mt-0 mr-10">
          About us
        </a>
        <a href="/index_dark.html" class="block font-bold hover:text-gray-700 mt-4 lg:inline-block lg:mt-0">
          Feedback
        </a>
      </div>

      <!-- CTA and Hamburger icon -->
      <div class="flex items-center">
        <div class="mr-5 lg:mr-0">
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