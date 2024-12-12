<script setup>
import { ref, onMounted } from 'vue';
import { format } from 'date-fns';

import { useMaintenanceStore } from '@/stores/maintenance';
import MaintenanceLayout from '@/layout/MaintenanceLayout.vue';

const { getAllMaintenances } = useMaintenanceStore()
const { updateMaintenance } = useMaintenanceStore();

const maintenances = ref([]);
const filters = ref({});

const fetchMaintenances = async () => {
  maintenances.value = await getAllMaintenances(filters.value);
};

onMounted(fetchMaintenances);

const setFilter = (filterKey, filterValue) => {
  if (filterValue === '') {
    filters.value = {}; // Clear all filters
  } else {
    filters.value[filterKey] = filterValue;
  }

  fetchMaintenances();

  console.log(maintenances.value);
};


const isActiveFilter = (filterKey, filterValue) => {
  if (filterValue === '' && Object.keys(filters.value).length === 0) {
    return true;
  }
  return filters.value[filterKey] === filterValue;
};

const handleComplete = (id) => {
  updateMaintenance(id, "completed");
  fetchMaintenances();

}

const formatDate = (date) => {
  return format(new Date(date), 'dd/MM/yy');
};

</script>

<template>

  <MaintenanceLayout>
    <div class="">

      <div class="flex gap-x-4 items-end ml-48 mt-6">
        <p class="font-bold text-lg">Filter:</p>
        <button @click="setFilter('completed', '')" :class="{ 'bg-light-blue': isActiveFilter('completed', '') }"
          class="border border-gray-400 px-2 py-1 rounded-sm">All</button>
        <button @click="setFilter('completed', '1')" :class="{ 'bg-light-blue': isActiveFilter('completed', '1') }"
          class="border border-gray-400 px-2 py-1 rounded-sm">Completed</button>
        <button @click="setFilter('completed', '0')" :class="{ 'bg-light-blue': isActiveFilter('completed', '0') }"
          class="border border-gray-400 px-2 py-1 rounded-sm">Not Completed</button>
      </div>

      <div v-if="maintenances.length > 0" class="mt-12 w-full flex flex-col gap-y-6 ml-52">
        <div v-for="maintenance in maintenances" :key="maintenance.id"
          class="w-full relative max-w-4xl shadow-xl border py-3 px-4 border-gray-300">
          <div class="space-y-2">
            <h1>Customer: <span class="font-bold">{{ maintenance.creator.name }}</span></h1>
            <h1>Phone Number: <span class="font-bold">{{ maintenance.phone_number }}</span></h1>
            <h1>Address: <span class="font-bold">{{ maintenance.address }}</span></h1>
            <h1>Issued Date: <span class="font-bold">{{ formatDate(maintenance.created_at) }}</span></h1>
            <h1>Description: <span class="font-bold">{{ maintenance.description }}</span></h1>
            <h1>Status: <span class="font-bold">{{ `${maintenance.completed ? 'Completed' : 'Not Completed'}`
                }}</span></h1>
          </div>
          <div class="absolute top-0 right-5 space-x-3 ">
            <button @click="handleComplete(maintenance.id)" v-if="!maintenance.completed"
              class="px-2 py-1 mt-2 rounded-md bg-green-500 text-white">Mark
              Completed</button>
          </div>
        </div>
      </div>
      <div class="mt-16" v-else>
        <p class="text-red-500 text-3xl text-center">Maintenance Request Not Found </p>
        <p class="text-xl text-center">Change The Filter Option</p>
      </div>
    </div>

  </MaintenanceLayout>
</template>