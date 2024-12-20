import { defineStore } from "pinia";
import router from "@/router";
export const useUserStore = defineStore("userStore", {
  state: () => {
    return {
      errors: {},
    };
  },

  actions: {
    /*********************  Get All Users ********************** */
    async getUsers() {
      const res = await fetch("/api/users", {
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

    /*********************  Update User ********************** */

    async updateUser(formData, user) {
      const res = await fetch(`/api/users/${user}`, {
        method: 'PUT',
        headers: {
          Authorization: `Bearer ${localStorage.getItem("token")}`,
        },
        body: JSON.stringify(formData)
      })

      const data = await res.json();

      if (data.errors) {
        this.errors = data.errors
      } else {
        this.errors = {};
      }


    },

    /*********************  Delete User ********************** */

    async deleteUser(user) {
      const res = await fetch(`/api/users/${user}`, {
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
