<script setup>
import AdminLayout from '@/layout/AdminLayout.vue';
import { useVacancyStore } from '@/stores/vacancy';
import Logo from '@/ui/Logo.vue';
import { storeToRefs } from 'pinia';
import { onMounted, reactive } from "vue";

const { createVacancy } = useVacancyStore()
const { errors } = storeToRefs(useVacancyStore())

const formData = reactive({
  title: "",
  location: "",
  type: "",
});

const submitForm = () => {
  createVacancy(formData)
};
</script>

<template>
  <AdminLayout>
    <div class="flex max-h-[calc(100vh-90px)] my-4 flex-col justify-center py-0 px-4">
      <div class="mx-auto w-full max-w-md rounded-2xl border border-gray-300 p-8">
        <div class="mb-12 text-center">
          <Logo />

          <h1 class="mt-8 text-2xl font-bold"> <span class="text-light-blue">Job Vacancy</span> Form </h1>
        </div>
        <form @submit.prevent="submitForm">
          <div class="space-y-6">
            <div>
              <label for="title" class="mb-2 block text-sm text-gray-800">Job title</label>
              <input v-model="formData.title" id="title" name="title" type="text" autocomplete="title"
                class="w-full rounded-md border border-gray-300 bg-white px-4 py-3 text-sm text-gray-800 outline-bg-light-green"
                placeholder="Enter Job Title" />
              <p v-if="errors.title" class="text-sm text-red-500">
                {{ errors.title[0] }}
              </p>
            </div>
            <div>
              <label for="location" class="mb-2 block text-sm text-gray-800">Job location</label>
              <input v-model="formData.location" id="location" name="location" type="text" autocomplete="country-name"
                class="w-full rounded-md border border-gray-300 bg-white px-4 py-3 text-sm text-gray-800 outline-bg-light-green"
                placeholder="Enter Job location" />
              <p v-if="errors.location" class="text-sm text-red-500">
                {{ errors.location[0] }}
              </p>
            </div>
            <div>
              <label for="type" class="mb-2 block text-sm text-gray-800">Job type</label>
              <select v-model="formData.type" id="type" name="type"
                class="w-full rounded-md border border-gray-300 bg-white px-4 py-3 text-sm text-gray-800 outline-bg-light-green">
                <option value="" disabled>Select Job Type</option>
                <option value="full_time">Full Time</option>
                <option value="part_time">Part Time</option>
              </select>
              <p v-if="errors.type" class="text-sm text-red-500">
                {{ errors.type[0] }}
              </p>
            </div>
            <div>
            </div>
          </div>
          <div class="max-w-[150px]  ml-auto">
            <button type="submit" class=" w-full rounded-md bg-blue-500 p-2 text-white">
              Submit
            </button>
          </div>
        </form>
      </div>
    </div>
  </AdminLayout>
</template>