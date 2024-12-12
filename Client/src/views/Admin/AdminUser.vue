<script setup>
import AdminLayout from '@/layout/AdminLayout.vue';
import { useUserStore } from '@/stores/user';
import { onMounted, ref } from 'vue';

const { getUsers } = useUserStore();
const { deleteUser } = useUserStore();

const users = ref([]);

onMounted(async () => {
  users.value = await getUsers();

  console.log(users.value);
})

const handleDelete = async (id) => {
  deleteUser(id);
  users.value = await getUsers();
}

</script>

<template>
  <AdminLayout>
    <div v-if="users" class="shadow-lg rounded-lg overflow-hidden mx-4 md:mx-10">
      <table class="w-full table-fixed">
        <thead>
          <tr class="bg-gray-100">
            <th class="w-1/4 py-4 px-6 text-left text-gray-600 font-bold uppercase">Name</th>
            <th class="w-1/4 py-4 px-6 text-left text-gray-600 font-bold uppercase">Email</th>

            <th class="w-1/4 text-center py-4 px-6 text-left text-gray-600 font-bold uppercase">Option</th>
          </tr>
        </thead>
        <tbody class="bg-white">
          <tr v-for="user in users">
            <td class="py-4 px-6 border-b border-gray-200">{{ user.name }}</td>
            <td class="py-4 px-6 border-b border-gray-200 truncate">{{ user.email }}</td>

            <td @click="handleDelete(user.id)"
              class="py-4 cursor-pointer flex justify-center px-6 border-b border-gray-200">
              <span class="bg-red-500 text-white py-1 px-2 rounded-sm ">Delete</span>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </AdminLayout>
</template>