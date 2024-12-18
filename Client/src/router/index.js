import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import RegisterPage from '@/views/Auth/RegisterPage.vue'
import LoginPage from '@/views/Auth/LoginPage.vue'
import OrderMaintenance from '@/views/User/OrderMaintenance.vue'
import SubmitFeedback from '@/views/User/SubmitFeedback.vue'
import { useAuthStore } from "@/stores/auth";
import VacancyPage from '@/views/User/VacancyPage.vue'
import AdminHome from '@/views/Admin/AdminHome.vue'
import AdminMaintenancePage from '@/views/Admin/AdminMaintenancePage.vue'
import AdminFeedback from '@/views/Admin/AdminFeedback.vue'
import MaintenanceHome from '@/views/Maintenance/MaintenanceHome.vue'
import AdminVacancy from '@/views/Admin/AdminVacancy.vue'
import AboutUs from '@/views/User/AboutUs.vue'
import CustomerServiceHome from '@/views/Customer_Service_Expert/CustomerServiceHome.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'Home',
      component: HomeView,
      meta: { hybrid: true },

    },
    {
      path: '/about-us',
      name: 'AboutUs',
      component: AboutUs,
      meta: { hybrid: true },

    },
    {
      path: '/register',
      name: 'Register',
      component: RegisterPage,
      meta: { guest: true },

    },
    {
      path: '/login',
      name: 'Login',
      component: LoginPage,
      meta: { guest: true },
    },
    {
      path: '/vacancy',
      name: 'Vacancy',
      component: VacancyPage,
      meta: { hybrid: true },

    },
    {
      path: '/maintenance',
      name: 'OrderMaintenance',
      component: OrderMaintenance,
      meta: { auth: true },

    },
    {
      path: '/feedback',
      name: 'SubmitFeedback',
      component: SubmitFeedback,
      meta: { auth: true },
    },
    {
      path: "/admin",
      name: "adminHome",
      component: AdminHome,
      meta: { admin: true },
    },
    {
      path: "/admin/maintenance",
      name: "AdminMaintenance",
      component: AdminMaintenancePage,
      meta: { admin: true },
    },
    {
      path: "/users",
      name: "CustomerServiceHome",
      component: CustomerServiceHome,
      meta: { CustomerService: true },
    },
    {
      path: "/admin/feedback",
      name: "AdminFeedback",
      component: AdminFeedback,
      meta: { admin: true },
    },
    {
      path: "/admin/vacancy",
      name: "AdminVacancy",
      component: AdminVacancy,
      meta: { admin: true },
    },
    {
      path: "/maintenance",
      name: "MaintenanceHome",
      component: MaintenanceHome,
      meta: { Maintenance: true },
    }

  ],
})

router.beforeEach(async (to, from) => {
  const authStore = useAuthStore();
  await authStore.getUser();

  if (authStore.user?.role === "maintenance" && to.meta.guest) {
    return { name: "MaintenanceHome" };
  }
  if (authStore.user?.role === "maintenance" && to.meta.auth) {
    return { name: "MaintenanceHome" };
  }
  if (authStore.user?.role === "maintenance" && to.meta.CustomerService) {
    return { name: "MaintenanceHome" };
  }
  if (authStore.user?.role === "maintenance" && to.meta.hybrid) {
    return { name: "MaintenanceHome" };
  }


  if (authStore.user?.role === "customer_service" && to.meta.guest) {
    return { name: "CustomerServiceHome" };
  }
  if (authStore.user?.role === "customer_service" && to.meta.auth) {
    return { name: "CustomerServiceHome" };
  }
  if (authStore.user?.role === "customer_service" && to.meta.hybrid) {
    return { name: "CustomerServiceHome" };
  }


  if (authStore.user?.role === "admin" && to.meta.guest) {
    return { name: "adminHome" };
  }
  if (authStore.user?.role === "admin" && to.meta.auth) {
    return { name: "adminHome" };
  }
  if (authStore.user?.role === "admin" && to.meta.hybrid) {
    return { name: "adminHome" };
  }
  if (authStore.user?.role === "admin" && to.meta.CustomerService) {
    return { name: "adminHome" };
  }
  if (authStore.user?.role !== "admin" && to.meta.admin) {
    return { name: "Home" };
  }


  if (authStore.user && to.meta.guest) {
    return { name: "Home" };
  }
  if (!authStore.user && to.meta.auth) {
    return { name: "Login" };
  }
  if (!authStore.user && to.meta.CustomerService) {
    return { name: "Login" };
  }
});


export default router
