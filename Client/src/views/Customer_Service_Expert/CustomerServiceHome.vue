<script setup>
import EditUserModal from '@/components/Customer_Service_Expert/EditUserModal.vue';
import AdminLayout from '@/layout/AdminLayout.vue';
import CustomerExpertLayout from '@/layout/CustomerExpertLayout.vue';
import { useUserStore } from '@/stores/user';
import { computed, onMounted, reactive, ref } from 'vue';

const { getUsers } = useUserStore();
const { deleteUser } = useUserStore();

const users = ref([]);
const searchQuery = ref('');
const isEditOpen = ref(false)


const selectedUser = reactive({
  user_id: null,
  user_name: null,
  user_woreda: null,
  user_kebele: null,
  user_house_number: null,
})

onMounted(async () => {
  users.value = await getUsers();


})

const handleDelete = async (id) => {
  deleteUser(id);
  users.value = await getUsers();
}


const filteredUsers = computed(() => {
  if (!searchQuery.value) {
    return users.value;
  }
  return users.value.filter(user =>
    user.name.toLowerCase().includes(searchQuery.value.toLowerCase()) ||
    user.email.toLowerCase().includes(searchQuery.value.toLowerCase())
  );
});
function closeEditModal() {
  isEditOpen.value = false
}
function openEditModal(user) {
  isEditOpen.value = true
  selectedUser.user_id = user.id,
    selectedUser.user_name = user.name,
    selectedUser.user_woreda = user.woreda,
    selectedUser.user_kebele = user.kebele,
    selectedUser.user_house_number = user.house_number


}


const updateUser = async () => {
  users.value = await getUsers();
};


</script>

<template>
  <CustomerExpertLayout>
    <div v-if="users" class="shadow-lg rounded-lg overflow-hidden mx-4 md:mx-10">
      <!-- Search Bar -->
      <EditUserModal @closeEditModal="closeEditModal" @updateUser="updateUser" :isEditOpen="isEditOpen"
        :user_id="selectedUser.user_id" :user_name="selectedUser.user_name" :user_woreda="selectedUser.user_woreda"
        :user_kebele="selectedUser.user_kebele" :user_house_number="selectedUser.user_house_number" />

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

      <!-- User List Table -->

      <table class="w-full table-fixed">
        <thead>
          <tr class="bg-gray-100">
            <th class="w-1/4 py-4 px-6 text-left text-gray-600 font-bold uppercase">Name</th>
            <th class="w-1/4 py-4 px-6 text-left text-gray-600 font-bold uppercase">Email</th>

            <th class="w-1/4 text-center py-4 px-6  text-gray-600 font-bold uppercase">Option</th>
          </tr>
        </thead>
        <tbody class="bg-white">
          <tr v-for="user in filteredUsers">
            <td class="py-4 px-6 border-b border-gray-200">{{ user.name }}</td>
            <td class="py-4 px-6 border-b border-gray-200 truncate">{{ user.email }}</td>

            <td class="py-4 cursor-pointer  gap-x-4 flex justify-center px-6 border-b border-gray-200">
              <span @click="handleDelete(user.id)" class="bg-red-500 text-white py-1 px-2 rounded-sm ">Delete</span>
              <span @click="openEditModal(user)" class="bg-green-500 text-white py-1 px-2 rounded-sm ">Update</span>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </CustomerExpertLayout>
</template>