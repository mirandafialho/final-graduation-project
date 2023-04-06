import { createRouter, createWebHistory } from 'vue-router'

import HomeView from '@/views/HomeView.vue'
import LoginView from '@/views/LoginView.vue'
import AboutView from '@/views/AboutView.vue'
import DashboardView from '@/views/DashboardView.vue'
import ClientsView from '@/views/ClientsView.vue'
import CatalogServicesView from '@/views/CatalogServicesView.vue'

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
    path: '/login',
    name: 'Login',
    component: LoginView,
    meta: {
      isAuthenticated: false
    }
  },
  {
    path: '/dashboard',
    name: 'Dashboard',
    component: DashboardView,
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
    path: '/about',
    name: 'About',
    component: AboutView,
    meta: {
      isAuthenticated: false
    }
  }
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
