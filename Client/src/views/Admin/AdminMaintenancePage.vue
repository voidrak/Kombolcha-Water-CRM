<script setup>
import { ref, onMounted } from 'vue';
import { format } from 'date-fns';
import AdminLayout from '@/layout/AdminLayout.vue';
import { useMaintenanceStore } from '@/stores/maintenance';

const { getAllMaintenances } = useMaintenanceStore()
const { deleteMaintenance } = useMaintenanceStore();
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

const handleDelete = (id) => {
  deleteMaintenance(id);
  fetchMaintenances();

}
const handleApprove = (id) => {
  updateMaintenance(id, "approve");
  fetchMaintenances();

}

const formatDate = (date) => {
  return format(new Date(date), 'dd/MM/yy');
};


</script>

<template>
  <AdminLayout>
    <div class="">
      <h1 class="text-4xl text-center font-bold mt-6"> <span class="text-light-blue">Maintenance</span> Request List
      </h1>


      <div class="flex gap-x-4 items-end ml-20 mt-6">
        <p class="font-bold text-lg">Filter:</p>
        <button @click="setFilter('completed', '')" :class="{ 'bg-light-blue': isActiveFilter('completed', '') }"
          class="border border-gray-400 px-2 py-1 rounded-sm">All</button>
        <button @click="setFilter('completed', '1')" :class="{ 'bg-light-blue': isActiveFilter('completed', '1') }"
          class="border border-gray-400 px-2 py-1 rounded-sm">Completed</button>
        <button @click="setFilter('completed', '0')" :class="{ 'bg-light-blue': isActiveFilter('completed', '0') }"
          class="border border-gray-400 px-2 py-1 rounded-sm">Not Completed</button>
        <button @click="setFilter('approved', '1')" :class="{ 'bg-light-blue': isActiveFilter('approved', '1') }"
          class="border border-gray-400 px-2 py-1 rounded-sm">Approved</button>
        <button @click="setFilter('approved', '0')" :class="{ 'bg-light-blue': isActiveFilter('approved', '0') }"
          class="border border-gray-400 px-2 py-1 rounded-sm">Not Approved</button>
      </div>

      <div v-if="maintenances.length > 0" class="mt-12 w-full flex flex-col gap-y-6 ml-16">
        <div v-for="maintenance in maintenances" :key="maintenance.id"
          class="w-full relative max-w-4xl shadow-xl border py-3 px-4 border-gray-300">
          <div class="space-y-2">
            <h1>Customer: <span class="font-bold">{{ maintenance.creator.name }}</span></h1>
            <h1>Phone Number: <span class="font-bold">{{ maintenance.phone_number }}</span></h1>
            <h1>Issued Date: <span class="font-bold">{{ formatDate(maintenance.created_at) }}</span></h1>
            <h1>Description: <span class="font-bold">{{ maintenance.description }}</span></h1>
            <h1>Status: <span class="font-bold">{{ `${maintenance.completed ? 'Completed' : 'Not Completed'}`
                }}</span></h1>
          </div>
          <div class="absolute top-0 right-5 space-x-3 ">
            <button @click="handleDelete(maintenance.id)"
              class="px-2 py-1 mt-2 rounded-md bg-red-500 text-white">Delete</button>
            <button @click="handleApprove(maintenance.id)" v-if="maintenance.completed && !maintenance.approved"
              class="px-2 py-1 mt-2 rounded-md bg-green-500 text-white">Approve</button>
          </div>
        </div>
      </div>
      <div class="mt-16" v-else>
        <p class="text-red-500 text-3xl text-center">Maintenance Request Not Found </p>
        <p class="text-xl text-center">Change The Filter Option</p>
      </div>
    </div>
  </AdminLayout>
</template>