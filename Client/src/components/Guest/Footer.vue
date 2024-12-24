<script setup>
</script>

<template>
  <div class="bg-gray-100 border-t    w-full border-gray-300  mt-16">
    <div class="max-w-screen-lg px-4  sm:px-6 text-gray-800 sm:grid md:grid-cols-4 sm:grid-cols-2 mx-auto">
      <RouterLink :to="{ name: 'Home' }" class=" col-span- p-5">
        <h3 class="font-bold text-xl   text-light-blue">Kombolcha City Water Supply</h3>
      </RouterLink>
      <div class="p-5">
        <div class="text-sm uppercase text-light-blue font-bold">Services</div>
        <RouterLink :to="{ name: 'OrderMaintenance' }" class="my-3 block" href="/#">Order Maintenance <span
            class="text-teal-600 text-xs p-1"></span></RouterLink>
        <RouterLink :to="{ name: 'SubmitFeedback' }" class="my-3 block" href="/#">Give Feedback <span
            class="text-teal-600 text-xs p-1"></span>
        </RouterLink>
      </div>
      <div class="p-5">
        <div class="text-sm uppercase text-light-blue font-bold">More</div>
        <RouterLink :to="{ name: 'Vacancy' }" class="my-3 block" href="/#">Vacancy <span
            class="text-teal-600 text-xs p-1"></span></RouterLink>
      </div>
      <div class="p-5">
        <div class="text-sm uppercase text-light-blue font-bold">Contact us</div>
        <RouterLink :to="{ name: 'AboutUs' }" class="my-3 block" href="/#">About Us
          <span class="text-teal-600 text-xs p-1"></span>
        </RouterLink>
      </div>
    </div>
  </div>



</template>