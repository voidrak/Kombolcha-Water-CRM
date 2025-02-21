<script setup>
import GuestLayout from '@/layout/GuestLayout.vue';
import { useVacancyStore } from '@/stores/vacancy';
import { computed, onMounted, reactive, ref } from 'vue';

const { getAllVacancies } = useVacancyStore()
const { deleteVacancy } = useVacancyStore()
const searchQuery = ref('');


const jobs = ref([]);

onMounted(async () => {
  jobs.value = await getAllVacancies();
  console.log(jobs.value);
})


const filteredJobs = computed(() => {
  if (!searchQuery.value) {
    return jobs.value;
  }
  return jobs.value.filter(job =>
    job.title.toLowerCase().includes(searchQuery.value.toLowerCase()) ||
    job.type.toString().includes(searchQuery.value) ||
    job.location.toString().includes(searchQuery.value)
  );
});

</script>

<template>
  <GuestLayout>
    <div class="">
      <h1 class="text-center py-8 font-bold text-4xl">We’re Hiring – <span class="text-light-blue"> Apply Today!</span>
      </h1>
      <div v-if="jobs"
        class="relative flex flex-col gap-y-4 items-center justify-center overflow-hidden bg-gray-50 p-6 sm:py-12">

        <div class=" pt-2 relative py-4 max-w-screen-md text-gray-600">
          <input v-model="searchQuery"
            class="border-2 w-full border-gray-300 bg-white h-10 py-2 px-5 pr-16 rounded-lg text-sm focus:outline-none"
            type="search" name="search" placeholder="Search">
          <button type="submit" class="absolute right-0 top-0 mt-5 mr-4">
            <svg class="text-gray-600 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
              xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px"
              viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve"
              width="512px" height="512px">
              <path
                d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
            </svg>
          </button>
        </div>


        <div v-for="(job, index) in filteredJobs" :key="index"
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