import { defineStore } from "pinia";
import router from "@/router";
export const useBillStore = defineStore("billStore", {
  state: () => {
    return {
      errors: {},
    };
  },

  actions: {
    /*********************  GetAll  Feedback ********************** */
    async getAllBills() {
      const res = await fetch("/api/bills", {
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
    async createBill(formData) {
      const res = await fetch("/api/bills", {
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
