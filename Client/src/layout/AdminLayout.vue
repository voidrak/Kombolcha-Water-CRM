<script setup>
import { ref } from "vue";

import { useAuthStore } from "@/stores/auth";
import AdminLargeSideBar from "@/components/Admin/AdminLargeSideBar.vue";
import Logo from "@/ui/Logo.vue";

const authStore = useAuthStore();
const isSideOpen = ref(false);

const toggleSideBar = () => {
  isSideOpen.value = !isSideOpen.value;
};
</script>

<template>
  <div class="grid h-screen w-full grid-cols-10 overflow-y-hidden bg-bg-tan font-DMSans lg:flex">
    <AdminLargeSideBar />

    <div class="inside col-span-10 w-full overflow-auto md:col-span-7">
      <!-- heading -->
      <div class="border-y border-gray-400">
        <div class="hidden items-center justify-center px-4 py-5 md:flex">
          <h1 class="text-2xl text-center font-Montserrat text-bg-dark-green xl:text-3xl font-bold">
            Admin Dashboard
          </h1>
        </div>
        <div class="flex items-center justify-between p-3 md:hidden">

          <div @click="toggleSideBar" class="md:hidden" :class="[`${isSideOpen ? `hidden` : ``}`]">
            <svg class="size-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
              <path
                d="M0 96C0 78.3 14.3 64 32 64l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 128C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 288c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32L32 448c-17.7 0-32-14.3-32-32s14.3-32 32-32l384 0c17.7 0 32 14.3 32 32z" />
            </svg>
          </div>
          <Logo />
        </div>
      </div>
      <div class="pt-3 pl-3 w-full">
        <slot> </slot>
      </div>
    </div>
  </div>
</template>
