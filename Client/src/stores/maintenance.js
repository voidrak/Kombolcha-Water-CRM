import { defineStore } from "pinia";
import router from "@/router";
export const useMaintenanceStore = defineStore("maintenanceStore", {
  state: () => {
    return {
      errors: {},
    };
  },

  actions: {
    /*********************  Create Feedback ********************** */
    async createMaintenance(formData) {
      const res = await fetch("/api/maintenance", {
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

  },
});
