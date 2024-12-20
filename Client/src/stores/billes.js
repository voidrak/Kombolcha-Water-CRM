import { defineStore } from "pinia";
import router from "@/router";
export const useFeedbackStore = defineStore("feedbackStore", {
  state: () => {
    return {
      errors: {},
    };
  },

  actions: {


    /*********************  Create Feedback ********************** */
    async createBill(formData) {
      const res = await fetch("/api/bills/create", {
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
        router.push({ name: "BillOfficerHome" });
      }
    },



  },
});
