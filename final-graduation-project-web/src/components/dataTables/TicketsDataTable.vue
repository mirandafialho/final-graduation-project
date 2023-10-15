<template>
  <section class="container mx-auto mt-8">
    <div class="sm:flex sm:items-center sm:justify-between">
      <div class="flex items-center mt-4 gap-x-3">
        <a @click="showTicketsModal">
          <button class="flex items-center justify-center w-1/2 px-5 py-2 text-sm text-white transition-colors duration-200 bg-primary border border-primary rounded-lg gap-x-2 sm:w-auto">
            <PlusIcon class="h-5 w-5 flex-shrink-0" />

            <span>Cadastrar</span>
          </button>
        </a>
      </div>

      <div class="relative flex items-center mt-4 md:mt-0">
        <span class="absolute">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mx-3 text-gray-400 dark:text-gray-600">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
            </svg>
        </span>

        <input type="text" placeholder="Search" class="block w-full py-1.5 pr-5 text-gray-700 bg-white border border-gray-200 rounded-lg md:w-80 placeholder-gray-400/70 pl-11 rtl:pr-11 rtl:pl-5 dark:text-gray-300 focus:border-blue-400 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40">
      </div>
    </div>

    <div class="flex flex-col mt-6">
      <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
          <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
              <thead class="bg-gray-50 dark:bg-gray-800">
                <tr>
                  <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    #
                  </th>

                  <th scope="col" class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <button class="flex items-center gap-x-3 focus:outline-none">
                      <span>Assunto</span>

                      <ChevronDownIcon class="h-4 w-4 flex-shrink-0" />
                    </button>
                  </th>

                  <th scope="col" class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    Cliente
                  </th>

                  <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    Situação
                  </th>

                  <th scope="col" class="relative py-3.5 px-4">
                    <span class="sr-only">Ações</span>
                  </th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                <tr v-for="ticket in tickets" :key="ticket.id">
                  <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                    {{ ticket.id }}
                  </td>
                  <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                    <div>
                      <h2 class="font-medium text-gray-800 dark:text-white">{{ ticket.subject }}</h2>
                      <p class="text-sm font-normal text-gray-600 dark:text-gray-400">{{ ticket.ticket }}</p>
                    </div>
                  </td>
                  <td class="px-12 py-4 text-sm font-medium whitespace-nowrap">
                    <div class="inline px-3 py-1 text-sm font-normal rounded-full text-emerald-500 gap-x-2 bg-emerald-100/60 dark:bg-gray-800">
                      {{ ticket.customer_id }}
                    </div>
                  </td>
                  <td class="px-4 py-4 text-sm whitespace-nowrap">
                    <div class="inline px-3 py-1 text-sm font-normal rounded-full text-emerald-500 gap-x-2 bg-emerald-100/60 dark:bg-gray-800">
                      {{ ticket.status }}
                    </div>
                  </td>

                  <td class="px-4 py-4 text-sm whitespace-nowrap">
                    <button class="px-1 py-1 text-gray-500 transition-colors duration-200 rounded-lg dark:text-gray-300 hover:bg-gray-100">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                      </svg>
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <AppPagination />
  </section>
  <TicketsModal
    :show="showModal"
    @ticket-created="ticketCreated"
    @close="showModal = false"
  />
</template>

<script>
  import {
    ChevronDownIcon,
    PlusIcon
  } from "@heroicons/vue/24/outline"
  import TicketsModal from "@/components/modals/TicketsModal"
  import TicketService from "@/services/TicketService"
  import AppPagination from "@/components/AppPagination"

  export default {
    name: "TicketsDataTable",
    components: {
      AppPagination,
      TicketsModal,
      ChevronDownIcon,
      PlusIcon
    },
    data() {
      return {
        showModal: false,
        tickets: null,
        ticketCreated: false,
      }
    },
    beforeMount() {
      this.fetchTickets()
    },
    created() {
      if (this.ticketCreated) {
        this.showModal = false
      }
    },
    methods: {
      fetchTickets() {
        TicketService.list()
          .then(response => {
            this.tickets = response.data
          })
          .catch(err => {
            console.error(err)
          })
      },
      showTicketsModal() {
        this.showModal = true
      }
    }
  }
</script>

<style scoped>

</style>
