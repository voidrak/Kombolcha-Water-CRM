<script setup>
import { ref, computed, reactive, onMounted, watch } from 'vue'
import {
  Combobox,
  ComboboxInput,
  ComboboxButton,
  ComboboxOptions,
  ComboboxOption,
  TransitionRoot,
} from '@headlessui/vue'
import { CheckIcon, ChevronUpDownIcon } from '@heroicons/vue/20/solid'
import BillOfficerLayout from '@/layout/BillOfficerLayout.vue';
import { useUserStore } from '@/stores/user';
import DatePicker from 'primevue/datepicker';
import InputNumber from 'primevue/inputnumber';
import { useBillStore } from '@/stores/billes';
import { storeToRefs } from 'pinia';


const { getUsers } = useUserStore();
const { createBill } = useBillStore();
const { errors } = storeToRefs(useBillStore());

const users = ref([]);

const formData = reactive({
  user_id: "",
  month: null,
  year: "",
  amount: ""
})


onMounted(async () => {
  users.value = await getUsers();


})





let selected = ref(users.value[0])
let query = ref('')

let filteredPeople = computed(() =>
  query.value === ''
    ? users.value
    : users.value.filter((person) =>
      person.name.toLowerCase().replace(/\s+/g, '').includes(query.value.toLowerCase().replace(/\s+/g, '')) ||
      person.id.toString().includes(query.value)
    )
);

watch(selected, (newSelected) => {
  formData.user_id = newSelected.id;
});

const handleDateChange = (event) => {
  const value = event.target.value;
  const [year, month] = value.split('-');
  formData.month = parseInt(month);
  formData.year = parseInt(year);
};

const submit = () => {
  createBill(formData)
}


</script>
<template>
  <BillOfficerLayout>
    <div class="flex max-h-[calc(100vh-90px)] mt-16 flex-col justify-center py-0 px-4">
      <div class="mx-auto w-full max-w-screen-md rounded-2xl border border-gray-300 p-8">
        <div class=" space-y-8  w-full">

          <label className="mb-2 md:text-base block text-xs font-bold uppercase tracking-wide text-black"
            htmlFor="name">
            Select The User "search by Name or Id"
          </label>
          <Combobox v-model="selected">
            <div class="relative mt-1">
              <div
                class="relative w-full cursor-default overflow-hidden rounded-lg bg-white text-left shadow-md focus:outline-none focus-visible:ring-2 focus-visible:ring-white/75 focus-visible:ring-offset-2 focus-visible:ring-offset-teal-300 sm:text-sm">
                <ComboboxInput class="w-full border-none py-2 pl-3 pr-10 text-sm leading-5 text-gray-900 focus:ring-0"
                  :displayValue="(person) => person.name" @change="query = $event.target.value" />
                <ComboboxButton class="absolute inset-y-0 right-0 flex items-center pr-2">
                  <ChevronUpDownIcon class="h-5 w-5 text-gray-400" aria-hidden="true" />
                </ComboboxButton>
              </div>
              <TransitionRoot leave="transition ease-in duration-100" leaveFrom="opacity-100" leaveTo="opacity-0"
                @after-leave="query = ''">
                <ComboboxOptions
                  class="absolute z-50 mt-1 max-h-60 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black/5 focus:outline-none sm:text-sm">
                  <div v-if="filteredPeople.length === 0 && query !== ''"
                    class="relative cursor-default select-none px-4 py-2 text-gray-700">
                    Nothing found.
                  </div>

                  <ComboboxOption v-for="person in filteredPeople" as="template" :key="person.id" :value="person"
                    v-slot="{ selected, active }">
                    <li class="relative cursor-default select-none py-2 pl-10 pr-4" :class="{
                      'bg-teal-600 text-white': active,
                      'text-gray-900': !active,
                    }">
                      <span class="block truncate" :class="{ 'font-medium': selected, 'font-normal': !selected }">
                        {{ person.name }}
                      </span>
                      <span v-if="selected" class="absolute inset-y-0 left-0 flex items-center pl-3"
                        :class="{ 'text-white': active, 'text-teal-600': !active }">
                        <CheckIcon class="h-5 w-5" aria-hidden="true" />
                      </span>
                    </li>
                  </ComboboxOption>
                </ComboboxOptions>
              </TransitionRoot>
            </div>
          </Combobox>
          <p v-if="errors.user_id" class="text-sm text-red-500">
            {{ errors.user_id[0] }}
          </p>

          <div class="max-w-sm  ">
            <label className="mb-2 md:text-base block text-xs font-bold uppercase tracking-wide text-black"
              htmlFor="name">
              Select The Month
            </label>

            <input type="month" id="month" @change="handleDateChange"
              class="w-full rounded-md border border-gray-300 bg-white px-4 py-3 text-sm text-gray-800 outline-bg-light-green" />
            <p v-if="errors.month || errors.year" class="text-sm text-red-500">
              {{ errors.month[0] || errors.year[0] }}
            </p>
          </div>


          <div class=" max-w-sm ">
            <label className="mb-2 md:text-base block text-xs font-bold uppercase tracking-wide text-black"
              htmlFor="name">
              Amount
            </label>
            <InputNumber v-model="formData.amount" inputId="currency-us" suffix=" Br" locale="en-US" fluid />

            <p v-if="errors.amount" class="text-sm text-red-500">
              {{ errors.amount[0] }}
            </p>

          </div>
        </div>
        <button @click="submit"
          className="ml-4  mt-4 rounded-lg bg-blue-700 px-8 py-2 text-center text-base font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300">
          Submit
        </button>
      </div>
    </div>
  </BillOfficerLayout>
</template>
