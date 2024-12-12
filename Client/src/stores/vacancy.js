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





    /*********************  Create feedback ********************** */
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

    /*********************  Update feedback ********************** */

    async updateVacancy(feedback, formData) {

      const res = await fetch(`/api/vacancies/${feedback}`, {
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
    /*********************  Delete feedback ********************** */

    async deleteVacancy(feedback) {
      const res = await fetch(`/api/vacancies/${feedback}`, {
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
