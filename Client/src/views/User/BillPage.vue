<script setup>
import GuestLayout from '@/layout/GuestLayout.vue';
import { useBillStore } from '@/stores/billes';
import { onMounted, ref } from 'vue';


const { getUserBills } = useBillStore();
const { updateBill } = useBillStore();


const userBill = ref([]);



onMounted(async () => {
  userBill.value = await getUserBills()
  console.log(userBill.value);
})

const handlePayment = async (id) => {
  updateBill(id, true);
  userBill.value = await getUserBills()

}

</script>

<template>
  <GuestLayout>
    <div class="  mt-16 px-10 mx-auto">
      <table class="w-full table-fixed">
        <thead>
          <tr class="bg-gray-100">

            <th class="w-1/4 py-4 px-6 text-left text-gray-600 font-bold uppercase">Bill Number</th>
            <th class="w-1/4 py-4 px-6 text-left text-gray-600 font-bold uppercase">Amount</th>
            <th class="w-1/4 py-4 px-6 text-left text-gray-600 font-bold uppercase">Month</th>
            <th class="w-1/4 py-4 px-6 text-left text-gray-600 font-bold uppercase">Year</th>
            <th class="w-1/4 py-4 px-6 text- text-gray-600 font-bold uppercase">Mark Us Paid</th>

          </tr>
        </thead>
        <tbody class="bg-white">
          <tr v-for="bill in userBill">

            <td class="py-4 px-6 border-b border-gray-200 truncate">{{ bill.bill_number }}</td>
            <td class="py-4 px-6 border-b border-gray-200 truncate">{{ bill.amount }}</td>
            <td class="py-4 px-6 border-b border-gray-200 truncate">{{ bill.month }}</td>
            <td class="py-4 px-6 border-b border-gray-200 truncate">{{ bill.year }}</td>

            <td @click="handlePayment(bill.id)"
              class="py-4 cursor-pointer  gap-x-4 flex justify-center px-6 border-b border-gray-200">
              <a href="https://chapa.co/" target="_blank" class="bg-green-500 text-white py-1 px-2 rounded-sm ">Make
                Payment</a>
            </td>


          </tr>
        </tbody>
      </table>
    </div>
  </GuestLayout>
</template>