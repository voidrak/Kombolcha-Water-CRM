import { defineStore } from "pinia";
import router from "@/router";
export const useVacancyStore = defineStore("vacancyStore", {
  state: () => {
    return {
      errors: {},
    };
  },

  actions: {
    /*********************  Get All vacancies ********************** */

    async getAllVacancies() {

      const res = await fetch(`/api/vacancies`, {
        method: "GET",
        headers: {
          Authorization: `Bearer ${localStorage.getItem("token")}`,
        },
      });
      const data = await res.json();

      return data;
    },





    /*********************  Create vacancy ********************** */
    async createVacancy(formData) {
      const res = await fetch("/api/vacancies", {
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
        router.push({ name: "adminHome" });
      }
    },

    /*********************  Update vacancy ********************** */

    async updateVacancy(vacancy, formData) {

      const res = await fetch(`/api/vacancies/${vacancy}`, {
        method: 'PUT',
        headers: {
          Authorization: `Bearer ${localStorage.getItem("token")}`,
        },

        body: JSON.stringify(formData)
      })
      const data = await res.json()

      if (data.errors) {
        this.errors = data.errors
      } else {
        this.errors = {}
      }
    },
    /*********************  Delete vacancy ********************** */

    async deleteVacancy(vacancy) {
      const res = await fetch(`/api/vacancies/${vacancy}`, {
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
