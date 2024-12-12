<script setup>
import AdminLayout from '@/layout/AdminLayout.vue';
import { useVacancyStore } from '@/stores/vacancy';
import { onMounted, ref } from 'vue';

const { getAllVacancies } = useVacancyStore()
const { deleteVacancy } = useVacancyStore()

const jobs = ref([]);

onMounted(async () => {
  jobs.value = await getAllVacancies();
  console.log(jobs.value);
})

const handleDelete = async (id) => {
  deleteVacancy(id)
  jobs.value = await getAllVacancies();

}

</script>

<template>
  <AdminLayout>
    <div v-if="jobs" class="">
      <h1 class="text-center py-8 font-bold text-4xl">Open Job Vacancy
      </h1>
      <table class="min-w-full divide-y divide-gray-200 overflow-x-auto">
        <thead class="bg-gray-50">
          <tr>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
              Job title
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
              Job location
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
              Job type
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
              Actions
            </th>
          </tr>
        </thead>
        <tbody v-for="(job, index) in jobs" :key="job.id" class="bg-white divide-y divide-gray-200">
          <tr>
            <td class="px-6 py-4 whitespace-nowrap">
              <div class="flex items-center">

                <div class="ml-4">
                  <div class="text-sm font-medium text-gray-900">
                    {{ job.title }}
                  </div>
                </div>
              </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
              <div class="text-sm text-gray-900">{{ job.location }}</div>

            </td>
            <td class="px-6 py-4 whitespace-nowrap">
              {{ job.type }}
            </td>
            <td @click="handleDelete(job.id)" class="px-6 py-4 whitespace-nowrap  text-sm font-medium">
              <a href="#" class="ml-2 text-red-600 hover:text-red-900">Delete</a>
            </td>
          </tr>



        </tbody>
      </table>
    </div>
  </AdminLayout>
</template>