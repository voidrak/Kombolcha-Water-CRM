<script setup>
import GuestLayout from '@/layout/GuestLayout.vue';
import { useVacancyStore } from '@/stores/vacancy';
import { onMounted, ref } from 'vue';

const { getAllVacancies } = useVacancyStore()
const { deleteVacancy } = useVacancyStore()


const jobs = ref([]);

onMounted(async () => {
  jobs.value = await getAllVacancies();
  console.log(jobs.value);
})



</script>

<template>
  <GuestLayout>
    <div class="">
      <h1 class="text-center py-8 font-bold text-4xl">We’re Hiring – <span class="text-light-blue"> Apply Today!</span>
      </h1>
      <div v-if="jobs"
        class="relative flex flex-col gap-y-4 items-center justify-center overflow-hidden bg-gray-50 p-6 sm:py-12">

        <div v-for="(job, index) in jobs" :key="index"
          class="bg-white  shadow-xl shadow-gray-100 w-full max-w-4xl flex flex-col sm:flex-row gap-3 sm:items-center  justify-between px-5 py-4 rounded-md">
          <div>

            <h3 class="font-bold mt-px"> {{ job.title }}</h3>
            <h3 class=" text-sm mt-px max-w-lg my-4"> {{ job.description }}</h3>
            <div class="flex items-center gap-3 mt-2">
              <span class=" text-light-blue rounded-full px-3 py-1 text-sm"> {{ job.type }}</span>
              <span class="text-slate-600 text-sm flex gap-1 items-center"> <svg xmlns="http://www.w3.org/2000/svg"
                  class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>{{ job.location }}</span>
            </div>
          </div>
          <div>
            <a href="mailto:KombolchaCityWaterSupplyVacancy@gmail.com"
              class="bg-light-blue cursor-pointer text-white font-medium px-4 py-2 rounded-md flex gap-1 items-center">Apply
              Now
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
              </svg>
            </a>
          </div>
        </div>

      </div>
    </div>
  </GuestLayout>
</template>