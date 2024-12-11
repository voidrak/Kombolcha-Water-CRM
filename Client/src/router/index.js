import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import RegisterPage from '@/views/Auth/RegisterPage.vue'
import LoginPage from '@/views/Auth/LoginPage.vue'
import OrderMaintenance from '@/views/User/OrderMaintenance.vue'
import SubmitFeedback from '@/views/User/SubmitFeedback.vue'
import { useAuthStore } from "@/stores/auth";
import VacancyPage from '@/views/User/VacancyPage.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'Home',
      component: HomeView,
    },
    {
      path: '/register',
      name: 'Register',
      component: RegisterPage
    },
    {
      path: '/login',
      name: 'Login',
      component: LoginPage
    },
    {
      path: '/vacancy',
      name: 'Vacancy',
      component: VacancyPage,

    },
    {
      path: '/order-maintenance',
      name: 'OrderMaintenance',
      component: OrderMaintenance,
      meta: { auth: true },

    },
    {
      path: '/submit-feedback',
      name: 'SubmitFeedback',
      component: SubmitFeedback,
      meta: { auth: true },
    },

  ],
})

router.beforeEach(async (to, from) => {
  const authStore = useAuthStore();
  await authStore.getUser();

  if (authStore.user?.role === "admin" && to.meta.guest) {
    return { name: "adminHome" };
  }
  if (authStore.user?.role === "admin" && to.meta.auth) {
    return { name: "adminHome" };
  }
  if (authStore.user?.role !== "admin" && to.meta.admin) {
    return { name: "home" };
  }
  if (authStore.user && to.meta.guest) {
    return { name: "home" };
  }
  if (!authStore.user && to.meta.auth) {
    return { name: "Login" };
  }
});


export default router
