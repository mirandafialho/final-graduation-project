import { createRouter, createWebHistory } from 'vue-router'

import HomeView from '@/views/HomeView.vue'
import LoginView from '@/views/LoginView.vue'
import AboutView from '@/views/AboutView.vue'
import ServiceDeskView from '@/views/ServiceDesk/ServiceDeskView.vue'
import ClientsView from '@/views/Clients/ClientsView.vue'
import CatalogServicesView from '@/views/CatalogServices/CatalogServicesView.vue'
import TicketsView from '@/views/Tickets/TicketsView.vue'
import DepartmentsView from '@/views/Departments/DepartmentsView.vue'

const routes = [
  {
    path: '/',
    name: 'Home',
    component: HomeView,
    meta: {
      isAuthenticated: false
    }
  },
  {
    path: '/about',
    name: 'About',
    component: AboutView,
    meta: {
      isAuthenticated: false
    }
  },
  {
    path: '/login',
    name: 'Login',
    component: LoginView,
    meta: {
      isAuthenticated: false
    }
  },
  {
    path: '/service-desk',
    name: 'ServiceDesk',
    component: ServiceDeskView,
    meta: {
      isAuthenticated: true
    }
  },
  {
    path: '/clients',
    name: 'Clients',
    component: ClientsView,
    meta: {
      isAuthenticated: true
    }
  },
  {
    path: '/catalog-services',
    name: 'CatalogServices',
    component: CatalogServicesView,
    meta: {
      isAuthenticated: true
    }
  },
  {
    path: '/tickets',
    name: 'Tickets',
    component: TicketsView,
    meta: {
      isAuthenticated: true
    }
  },
  {
    path: '/departments',
    name: 'Departments',
    component: DepartmentsView,
    meta: {
      isAuthenticated: true
    }
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

router.beforeEach((to, from, next) => {
  if (to.matched.some(record => record.meta.isAuthenticated)) {
    if (localStorage.getItem('access_token') == null) {
      next({
        path: '/login'
      })
    } else {
      next()
    }
  } else {
    next()
  }
})

export default router
