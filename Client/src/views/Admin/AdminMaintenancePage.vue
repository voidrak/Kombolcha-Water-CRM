<script setup>
import AdminLayout from '@/layout/AdminLayout.vue';

</script>

<template>
  <AdminLayout>
    <div class="">
      <h1 class="text-4xl text-center font-bold mt-6"> <span class="text-light-blue">Maintenance</span> Request List
      </h1>

      <div class="flex gap-x-4 items-end ml-20 mt-6">
        <p class="font-bold  text-lg">Filter:</p>
        <button class=" border border-gray-400 px-2 py-1 rounded-sm bg-light-blue">All</button>
        <button class=" border border-gray-400 px-2 py-1 rounded-sm">Completed</button>
        <button class=" border border-gray-400 px-2 py-1 rounded-sm">Not Completed</button>
        <button class=" border border-gray-400 px-2 py-1 rounded-sm">Approved</button>
        <button class=" border border-gray-400 px-2 py-1 rounded-sm">Not Approved</button>
      </div>

      <div class="mt-12 w-full flex flex-col  gap-y-6  ml-16">
        <div class="w-full relative max-w-4xl shadow-xl border py-3 px-4 border-gray-300">
          <div class="space-y-2">
            <h1 class="">Requester: <span class="font-bold">Nahom Abraham</span></h1>
            <h1 class="">Phone Number: <span class="font-bold">0921607264</span></h1>
            <h1 class="">Address: <span class="font-bold">Kombolcha 01</span></h1>
            <h1 class="">Issued Date: <span class="font-bold">19/02/2025</span></h1>
            <h1 class="">Description: <span class="font-bold"> Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                Reiciendis dolore maiores debitis velit? Quo, suscipit, veniam maxime repellendus fugit doloremque
                dolore corrupti ipsam dignissimos tempore excepturi. Aspernatur vero unde alias.</span></h1>
            <h1 class="">Status: <span class="font-bold">Not Competed</span></h1>
          </div>

          <div class="absolute top-0 right-5 space-x-3 ">
            <button class="px-2 py-1 mt-2 rounded-md bg-red-500 text-white">Delete</button>
            <button class="px-2 py-1 mt-2 rounded-md bg-green-500 text-white">Approve</button>
          </div>
        </div>
      </div>
    </div>
  </AdminLayout>
</template>