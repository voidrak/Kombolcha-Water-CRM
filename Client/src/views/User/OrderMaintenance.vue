<script setup>
import GuestLayout from '@/layout/GuestLayout.vue';
import { useMaintenanceStore } from '@/stores/maintenance';
import { reactive } from 'vue';
import { storeToRefs } from 'pinia';

const { createMaintenance } = useMaintenanceStore()
const { errors } = storeToRefs(useMaintenanceStore())



const formData = reactive({
  phone_number: "",
  description: "",
});

const submitForm = () => {
  createMaintenance(formData);
};

</script>

<template>
  <GuestLayout>
    <div class="w-full">


      <div class="mx-auto w-full mt-4 max-w-2xl rounded-2xl border border-gray-300 p-8">
        <h1 class="text-center mt-8 text-4xl font-bold"> Register Maintenance</h1>
        <form @submit.prevent="submitForm" class="mt-8">
          <div class="space-y-6">
            <div>
              <label for="phone_number" class="mb-2 block text-sm text-gray-800"> Phone Number To Contact</label>
              <input v-model="formData.phone_number" id="phone_number" name="phone_number" type="tel" autocomplete="tel"
                class="w-full rounded-md border border-gray-300 bg-white px-4 py-3 text-sm text-gray-800 outline-bg-light-green"
                placeholder="Enter Phone Number" />
              <p v-if="errors.phone_number" class="text-sm text-red-500 mt-1">
                Invalid Format! Use (0912345678) Format
              </p>
            </div>
            <div>
              <label for="description" class="mb-2 block text-sm text-gray-800"> Description</label>
              <textarea v-model="formData.description" id="description" name="description" type="text" autocomplete="de"
                class="w-full rounded-md border border-gray-300 bg-white px-4 py-3 text-sm text-gray-800 outline-bg-light-green"
                placeholder="Enter description" />

              <p v-if="errors.description" class="text-sm text-red-500 mt-1">
                {{ errors.description[0] }}
              </p>
            </div>

            <div class="max-w-[150px]  ml-auto">
              <button type="submit" class=" w-full rounded-md bg-blue-500 p-2 text-white">
                Submit
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </GuestLayout>
</template>