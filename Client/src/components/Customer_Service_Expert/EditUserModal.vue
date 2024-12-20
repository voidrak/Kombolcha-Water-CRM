<script setup>
import {
  TransitionRoot,
  TransitionChild,
  Dialog,
  DialogPanel,
  DialogTitle,
} from '@headlessui/vue'
import { storeToRefs } from 'pinia';
import { onMounted, reactive, watch, watchEffect } from "vue";

import { useUserStore } from '@/stores/user';





const props = defineProps(({
  isEditOpen: Boolean,
  user_id: Number,
  user_name: String,
  user_woreda: String,
  user_kebele: Number,
  user_house_number: Number,
}))


const emit = defineEmits(['updateUser', 'closeEditModal'])


const { errors } = storeToRefs(useUserStore())
const { updateUser } = useUserStore();


const formData = reactive({
  name: "",
  woreda: "Kombolcha",
  kebele: "",
  house_number: "",
});


const handleUpdate = () => {
  // console.log(formData);
  updateUser(formData, props.user_id)
  emit("updateUser");
  emit("closeEditModal")

}

onMounted(() => (errors.value = {}));

watchEffect(() => {
  formData.name = props.user_name || "";
  formData.woreda = props.user_woreda || "";
  formData.kebele = props.user_kebele || "";
  formData.house_number = props.user_house_number || "";
});


</script>
<template>

  <TransitionRoot appear :show="props.isEditOpen" as="template">
    <Dialog as="div" @close="$emit('closeEditModal')" class="relative z-10">
      <TransitionChild as="template" enter="duration-300 ease-out" enter-from="opacity-0" enter-to="opacity-100"
        leave="duration-200 ease-in" leave-from="opacity-100" leave-to="opacity-0">
        <div class="fixed inset-0 bg-black/25" />
      </TransitionChild>

      <div class="fixed inset-0 overflow-y-auto">
        <div class="flex min-h-full items-center justify-center p-4 text-center">
          <TransitionChild as="template" enter="duration-300 ease-out" enter-from="opacity-0 scale-95"
            enter-to="opacity-100 scale-100" leave="duration-200 ease-in" leave-from="opacity-100 scale-100"
            leave-to="opacity-0 scale-95">
            <DialogPanel
              class="w-full max-w-xl transform overflow-hidden rounded-2xl bg-white p-6 text-left align-middle shadow-xl transition-all">
              <DialogTitle as="h3" class="text-lg font-medium leading-6 text-black">
                Edit The Question
              </DialogTitle>
              <form @submit.prevent="submitForm">
                <div class="space-y-6">
                  <div>
                    <label for="name" class="mb-2 block text-sm text-gray-800">Full Name</label>
                    <input v-model="formData.name" id="name" name="name" type="text" autocomplete="name"
                      class="w-full rounded-md border border-gray-300 bg-white px-4 py-3 text-sm text-gray-800 outline-bg-light-green"
                      placeholder="Enter name" />
                    <p v-if="errors.name" class="text-sm text-red-500">
                      {{ errors.name[0] }}
                    </p>
                  </div>

                  <!-------------- Location ------------------------ -->

                  <div class="flex justify-between px-2 mt-4 mb-16">
                    <div>
                      <label for="woreda" class="mb-2 block text-sm text-gray-800">Woreda</label>
                      <input v-model="formData.woreda" id="woreda" name="woreda" type="text" autocomplete="woreda"
                        :disabled="true"
                        class="w-full rounded-md border border-gray-300 bg-white px-4 py-3 text-sm text-gray-800 outline-bg-light-green"
                        placeholder="Enter woreda" />
                      <p v-if="errors.location" class="text-sm text-red-500">
                        {{ errors.location }}
                      </p>
                    </div>
                    <div>
                      <label for="kebele" class="mb-2 block text-sm text-gray-800">Kebele</label>
                      <select id="kebele" name="kebele" v-model="formData.kebele"
                        class="col-start-1 row-start-1   appearance-none    pl-3 pr-8   outline outline-1 -outline-offset-1 outline-gray-300 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600   w-[100px] rounded-md border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-800 outline-bg-light-green">
                        <option v-for="kebele in [1, 2, 3, 4, 5, 6, 7, 8]" :key="kebele" :value="kebele">
                          {{ kebele }}
                        </option>
                      </select>
                      <p v-if="errors.location" class="text-sm text-red-500">
                        {{ errors.location }}
                      </p>
                    </div>
                    <div>
                      <label for="house_number" class="mb-2 block text-sm text-gray-800">House Number</label>
                      <input v-model="formData.house_number" id="house_number" name="house_number" type="text"
                        autocomplete="house_number"
                        class="w-full rounded-md border border-gray-300 bg-white px-4 py-3 text-sm text-gray-800 outline-bg-light-green"
                        placeholder="Enter House Number" />
                      <p v-if="errors.location" class="text-sm text-red-500">
                        {{ errors.location }}
                      </p>
                    </div>
                  </div>

                </div>
                <div>

                  <div>
                    <button @click="handleUpdate" type="submit"
                      class="w-full rounded-md bg-blue-500 p-2 mt-8 text-white">
                      Update
                    </button>
                  </div>
                </div>
              </form>
            </DialogPanel>
          </TransitionChild>
        </div>
      </div>
    </Dialog>
  </TransitionRoot>
</template>
