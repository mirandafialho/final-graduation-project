<template>
  <!-- Off-canvas menu for mobile, show/hide based on off-canvas menu state. -->
  <div class="relative z-40 lg:hidden" role="dialog" aria-modal="true">
    <!--
      Off-canvas menu backdrop, show/hide based on off-canvas menu state.

      Entering: "transition-opacity ease-linear duration-300"
        From: "opacity-0"
        To: "opacity-100"
      Leaving: "transition-opacity ease-linear duration-300"
        From: "opacity-100"
        To: "opacity-0"
    -->
    <div class="fixed inset-0 bg-gray-600 bg-opacity-75"></div>

    <div class="fixed inset-0 z-40 flex">
      <!--
        Off-canvas menu, show/hide based on off-canvas menu state.

        Entering: "transition ease-in-out duration-300 transform"
          From: "-translate-x-full"
          To: "translate-x-0"
        Leaving: "transition ease-in-out duration-300 transform"
          From: "translate-x-0"
          To: "-translate-x-full"
      -->
      <div class="relative flex w-full max-w-xs flex-1 flex-col bg-gray-800">
        <!--
          Close button, show/hide based on off-canvas menu state.

          Entering: "ease-in-out duration-300"
            From: "opacity-0"
            To: "opacity-100"
          Leaving: "ease-in-out duration-300"
            From: "opacity-100"
            To: "opacity-0"
        -->
        <div class="absolute top-0 right-0 -mr-12 pt-2">
          <button type="button" class="ml-1 flex h-10 w-10 items-center justify-center rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
            <span class="sr-only">Close sidebar</span>
            <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>

        <div class="h-0 flex-1 overflow-y-auto pt-5 pb-4">
          <div class="flex flex-shrink-0 items-center px-4">
            <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company">
          </div>
          <nav class="mt-5 space-y-1 px-2">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <a href="/service-desk" class="bg-gray-900 text-white group flex items-center rounded-md px-2 py-2 text-base font-medium">
              <HomeModernIcon class="text-gray-300 mr-3 h-6 w-6 flex-shrink-0" />
              Service Desk
            </a>

            <a href="/tickets" class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center rounded-md px-2 py-2 text-base font-medium">
              <TicketIcon class="text-gray-300 mr-3 h-6 w-6 flex-shrink-0" />
              Tickets
            </a>

            <a href="/catalog-services" class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center rounded-md px-2 py-2 text-base font-medium">
              <InboxStackIcon class="text-gray-300 mr-3 h-6 w-6 flex-shrink-0" />
              Catálogos de Serviço
            </a>

            <a href="/clients" class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center rounded-md px-2 py-2 text-base font-medium">
              <UserIcon class="text-gray-300 mr-3 h-6 w-6 flex-shrink-0" />
              Clientes
            </a>

            <a href="/departments" class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center rounded-md px-2 py-2 text-base font-medium">
              <UsersIcon class="text-gray-300 mr-3 h-6 w-6 flex-shrink-0" />
              Departamentos
            </a>
          </nav>
        </div>
        <div class="flex flex-shrink-0 bg-gray-700 p-4">
          <a href="#" class="group block flex-shrink-0">
            <div class="flex items-center">
              <div>
                <img class="inline-block h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
              </div>
              <div class="ml-3">
                <p class="text-base font-medium text-white">Tom Cook</p>
                <p class="text-sm font-medium text-gray-400 group-hover:text-gray-300">View profile</p>
              </div>
            </div>
          </a>
        </div>
        <div class="flex flex-shrink-0 bg-gray-700 p-4">
          <div class="group block w-full flex-shrink-0">
            <div class="items-center">
              <a class="flex cursor-pointer" @click="logout">
                <ArrowLeftOnRectangleIcon class="text-gray-300 mr-3 h-5 w-5 flex-shrink-0" />
                <p class="text-sm font-medium text-white">Logout</p>
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="w-14 flex-shrink-0">
        <!-- Force sidebar to shrink to fit close icon -->
      </div>
    </div>
  </div>

  <div class="hidden lg:fixed lg:inset-y-0 lg:flex lg:w-64 lg:flex-col">
    <div class="flex min-h-0 flex-1 flex-col bg-gray-800">
      <div class="flex flex-1 flex-col overflow-y-auto pt-5 pb-4">
        <div class="flex flex-shrink-0 items-center px-4">
          <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company">
        </div>
        <nav class="mt-5 flex-1 space-y-1 px-2">
          <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
          <a href="/service-desk" class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center rounded-md px-2 py-2 text-sm font-medium">
            <HomeModernIcon class="text-gray-300 mr-3 h-6 w-6 flex-shrink-0" />
            Service Desk
          </a>

          <a href="/tickets" class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center rounded-md px-2 py-2 text-sm font-medium">
            <TicketIcon class="text-gray-300 mr-3 h-6 w-6 flex-shrink-0" />
            Tickets
          </a>

          <a href="/catalog-services" class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center rounded-md px-2 py-2 text-sm font-medium">
            <InboxStackIcon class="text-gray-300 mr-3 h-6 w-6 flex-shrink-0" />
            Catálogos de Serviço
          </a>

          <a href="/clients" class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center rounded-md px-2 py-2 text-sm font-medium">
            <UserIcon class="text-gray-300 mr-3 h-6 w-6 flex-shrink-0" />
            Clientes
          </a>

          <a href="/departments" class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center rounded-md px-2 py-2 text-sm font-medium">
            <UsersIcon class="text-gray-300 mr-3 h-6 w-6 flex-shrink-0" />
            Departamentos
          </a>
        </nav>
      </div>
      <div class="flex flex-shrink-0 bg-gray-700 p-4">
        <div class="group block w-full flex-shrink-0">
          <div class="flex items-center">
            <div>
              <img class="inline-block h-9 w-9 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
            </div>
            <div class="ml-3">
              <p class="text-sm font-medium text-white">Tom Cook</p>
              <a class="cursor-pointer" @click="logout">
                <p class="text-xs font-medium text-gray-300 group-hover:text-gray-200">View profile</p>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="flex flex-shrink-0 bg-gray-700 p-4">
        <div class="group block w-full flex-shrink-0">
          <div class="items-center">
            <a class="flex cursor-pointer" @click="logout">
              <ArrowLeftOnRectangleIcon class="text-gray-300 mr-3 h-5 w-5 flex-shrink-0" />
              <p class="text-sm font-medium text-white">Logout</p>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import {
    ArrowLeftOnRectangleIcon,
    HomeModernIcon,
    TicketIcon,
    InboxStackIcon,
    UsersIcon,
    UserIcon
  } from "@heroicons/vue/24/outline"
  import LoginService from "@/services/LoginService"

  export default {
    name: "AppMenu",
    components: {
      ArrowLeftOnRectangleIcon,
      HomeModernIcon,
      TicketIcon,
      InboxStackIcon,
      UsersIcon,
      UserIcon
    },

    methods: {
      logout() {
        LoginService.logout()
          .then(response => {
            console.log(response)
            localStorage.clear()
            setInterval(() => this.$router.push({ name: "Home" }), 500)
          })
          .catch(error => {
            console.log(error)
          })
      }
    },
  }
</script>

<style scoped>

</style>