<script setup>
import AdminLayout from '@/layout/AdminLayout.vue';
import { useFeedbackStore } from '@/stores/feedback';
import { onMounted, ref } from 'vue';
import { format } from 'date-fns';

const { getAllFeedbacks } = useFeedbackStore()
const { deleteFeedback } = useFeedbackStore()


const feedbacks = ref([]);

onMounted(async () => {
  feedbacks.value = await getAllFeedbacks();

  console.log(feedbacks.value);
})

const handleDelete = async (id) => {
  deleteFeedback(id);
  feedbacks.value = await getAllFeedbacks();
}

const formatDate = (date) => {
  return format(new Date(date), 'dd/MM/yy');
};


</script>

<template>
  <AdminLayout>
    <div class="">
      <h1 class="text-4xl text-center font-bold mt-6"> <span class="text-light-blue">Feedback</span> List
      </h1>

      <div class="mt-12 w-full flex flex-col gap-y-6 ml-16">
        <div v-for="feedback in feedbacks" :key="feedback.id"
          class="w-full relative max-w-4xl shadow-xl border py-3 px-4 border-gray-300">
          <div class="space-y-2">
            <h1>Customer: <span class="font-bold">{{ feedback.creator.name }}</span></h1>
            <h1>Email: <span class="font-bold">{{ feedback.creator.email }}</span></h1>
            <h1>Issued Date: <span class="font-bold">{{ formatDate(feedback.created_at) }}</span></h1>
            <h1>Description: <span class="font-bold">{{ feedback.message }}</span></h1>
          </div>
          <div class="absolute top-0 right-5 space-x-3 ">
            <button @click="handleDelete(feedback.id)"
              class="px-2 py-1 mt-2 rounded-md bg-green-500 text-white">Approve</button>
          </div>
        </div>
      </div>
    </div>
  </AdminLayout>
</template>