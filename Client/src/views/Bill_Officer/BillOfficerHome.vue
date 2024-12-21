<script setup>
import UpdateBillModal from '@/components/Bill_Officer/UpdateBillModal.vue';
import BillOfficerLayout from '@/layout/BillOfficerLayout.vue';
import { useBillStore } from '@/stores/billes';
import { computed, onMounted, reactive, ref } from 'vue';



const { getAllBills } = useBillStore();


const bills = ref([]);
const searchQuery = ref('');
const isUpdateOpen = ref(false)
const selectedBillId = ref(null)

onMounted(async () => {
  bills.value = await getAllBills();
})

const filteredBills = computed(() => {
  if (!searchQuery.value) {
    return bills.value;
  }
  return bills.value.filter(bill =>
    bill.user.name.toLowerCase().includes(searchQuery.value.toLowerCase()) ||
    bill.bill_number.toString().includes(searchQuery.value) ||
    bill.month.toString().includes(searchQuery.value) || bill.year.toString().includes(searchQuery.value)
  );
});

function closeUpdateModal() {
  isUpdateOpen.value = false
  selectedBillId.value = null

}


function openUpdateModal(id) {
  isUpdateOpen.value = true
  selectedBillId.value = id
  console.log(selectedBillId.value);

}

const updateBill = async () => {
  bills.value = await getAllBills();
};

</script>

<template>
  <BillOfficerLayout>
    <UpdateBillModal @updateBill="updateBill" @closeUpdateModal="closeUpdateModal" :isUpdateOpen="isUpdateOpen"
      :bill_id="selectedBillId" />
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
    <table class="w-full table-fixed">
      <thead>
        <tr class="bg-gray-100">
          <th class="w-1/4 py-4 px-6 text-left text-gray-600 font-bold uppercase">Name</th>
          <th class="w-1/4 py-4 px-6 text-left text-gray-600 font-bold uppercase">Amount</th>
          <th class="w-1/4 py-4 px-6 text-left text-gray-600 font-bold uppercase">Month</th>
          <th class="w-1/4 py-4 px-6 text-left text-gray-600 font-bold uppercase">Year</th>
          <th class="w-1/4 py-4 px-6 text-left text-gray-600 font-bold uppercase">Bill Number</th>
          <th class="w-1/4 py-4 px-6 text- text-gray-600 font-bold uppercase">Mark Us Paid</th>

        </tr>
      </thead>
      <tbody class="bg-white">
        <tr v-for="bill in filteredBills">
          <td class="py-4 px-6 border-b border-gray-200">{{ bill.user.name }}</td>
          <td class="py-4 px-6 border-b border-gray-200 truncate">{{ bill.amount }}</td>
          <td class="py-4 px-6 border-b border-gray-200 truncate">{{ bill.month }}</td>
          <td class="py-4 px-6 border-b border-gray-200 truncate">{{ bill.year }}</td>
          <td class="py-4 px-6 border-b border-gray-200 truncate">{{ bill.bill_number }}</td>

          <td @click="openUpdateModal(bill.id)"
            class="py-4 cursor-pointer  gap-x-4 flex justify-center px-6 border-b border-gray-200">
            <span class="bg-green-500 text-white py-1 px-2 rounded-sm ">Mark Paid</span>
          </td>


        </tr>
      </tbody>
    </table>
  </BillOfficerLayout>
</template>