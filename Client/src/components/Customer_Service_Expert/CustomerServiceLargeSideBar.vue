<script setup>
import { useAuthStore } from "@/stores/auth";
import Logo from "@/ui/Logo.vue";


const authStore = useAuthStore();
</script>

<template>
  <div
    class="sidebar lg relative col-span-3 hidden flex-col justify-between py-16  rounded-br-[50px] rounded-tr-[50px] bg-dark-blue px-4 md:flex lg:w-[330px]">


    <Logo />


    <div class="flex cursor-pointer items-center gap-x-2 text-white">
      <svg class="size-5 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
        <path
          d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z" />
      </svg>
      <div class="">
        <form @submit.prevent="authStore.logout" class="">
          <button class="">Log out</button>
        </form>
      </div>
    </div>
  </div>
</template>
