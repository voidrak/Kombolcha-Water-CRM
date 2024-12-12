import { defineStore } from "pinia";
import router from "@/router";
export const useFeedbackStore = defineStore("feedbackStore", {
  state: () => {
    return {
      errors: {},
    };
  },

  actions: {
    /*********************  GetAll  Feedback ********************** */
    async getAllFeedbacks() {
      const res = await fetch("/api/feedbacks", {
        method: "Get",
        headers: {
          Authorization: `Bearer ${localStorage.getItem("token")}`,
        },
      });
      const data = await res.json();

      if (data.errors) {
        this.errors = data.errors;
      } else {
        this.errors = {};
        return data
      }
    },

    /*********************  Create Feedback ********************** */
    async createFeedback(formData) {
      const res = await fetch("/api/feedbacks", {
        method: "POST",
        headers: {
          Authorization: `Bearer ${localStorage.getItem("token")}`,
        },
        body: JSON.stringify(formData),
      });
      const data = await res.json();

      if (data.errors) {
        this.errors = data.errors;
      } else {
        this.errors = {};
        router.push({ name: "Home" });
      }
    },

    async deleteFeedback(feedback) {
      const res = await fetch(`/api/feedbacks/${feedback}`, {
        method: 'DELETE',
        headers: {
          Authorization: `Bearer ${localStorage.getItem("token")}`,
        },
      })
      const data = await res.json()

      if (data.errors) {
        this.errors = data.errors
      } else {
        this.errors = {}
      }
    },

  },
});
