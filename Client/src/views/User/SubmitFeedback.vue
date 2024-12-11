<script setup>
import GuestLayout from '@/layout/GuestLayout.vue';
import { reactive } from 'vue';

const formData = reactive({
  message: "",
});


const submitForm = () => {
  console.log("hey");
};
</script>

<template>
  <GuestLayout>
    <diiv class="w-full">


      <div class="mx-auto w-full mt-16 max-w-2xl rounded-2xl border border-gray-300 p-8">
        <h1 class="text-center mt-8 text-4xl font-bold"> Feedback Form</h1>
        <p class="mt-4 max-w-lg">We’re constantly working to improve our services, and your feedback is invaluable to us
        </p>
        <form @submit.prevent="submitForm" class="mt-8">
          <div class="space-y-6">
            <div>
              <label for="description" class="mb-2 block text-sm text-gray-800"> Feedback</label>
              <textarea v-model="formData.message" id="message" name="message" type="text" autocomplete="text"
                class="w-full rounded-md border border-gray-300 bg-white px-4 py-3 text-sm text-gray-800 outline-bg-light-green"
                placeholder="Enter Feedback" />
              <!-- <p v-if="errors.message" class="text-sm text-red-500">
        {{ errors.message[0] }}
      </p> -->
            </div>

            <div class="max-w-[150px]  ml-auto">
              <button type="submit" class=" w-full rounded-md bg-blue-500 p-2 text-white">
                Submit
              </button>
            </div>
          </div>
        </form>
      </div>
    </diiv>
  </GuestLayout>
</template>