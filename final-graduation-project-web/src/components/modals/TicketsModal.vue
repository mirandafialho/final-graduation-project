<template>
  <Transition name="modal">
    <div
        v-if="show"
        class="modal-mask"
        @click.self="$emit('close')"
    >
      <div class="modal-container">
        <div class="modal-header">
          <h2 class="text-2xl font-semibold text-gray-900">
            Novo Ticket
          </h2>
        </div>
        <form class="space-y-6" @submit.prevent="login">
          <div class="modal-body">
            <div class="mb-4">
              <label class="block text-sm font-medium leading-6 text-gray-900">
                <strong>Catálogo de Serviço</strong>
              </label>
              <div class="mt-2">
                <select v-model="serviceCatalog" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6">
                  <option v-for="item in serviceCatalogues" :value="item" :key="item.id">
                    {{ item.name }}
                  </option>
                </select>
              </div>
            </div>

            <div class="mb-4">
              <label class="block text-sm font-medium leading-6 text-gray-900">
                <strong>Departamento</strong>
              </label>
              <div class="mt-2">
                <select v-model="department" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6">
                  <option v-for="item in departments" :value="item" :key="item.id">
                    {{ item.name }}
                  </option>
                </select>
              </div>
            </div>

            <div class="mb-4">
              <label class="block text-sm font-medium leading-6 text-gray-900">
                <strong>Assunto</strong>
              </label>
              <div class="mt-2">
                <input v-model="subject" type="text" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6" required />
              </div>
            </div>

            <div class="mb-4">
              <label class="block text-sm font-medium leading-6 text-gray-900">
                <strong>Descrição</strong>
              </label>
              <div class="mt-2">
                <textarea v-model="description" rows="5" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6" required />
              </div>
            </div>

            <div class="mb-4">
              <label class="block text-sm font-medium leading-6 text-gray-900">
                <strong>Prazo de Encerramento</strong>
              </label>
              <div class="mt-2">
                <VueDatePicker
                    :model-value="dateEnd"
                    locale="pt-BR"
                    :min-date="new Date()"
                    :format-locale="localization"
                    :format="dateFormat"
                    @update:model-value="setDateEnd"
                    placeholder="Selecione a data prevista de encerramento"
                />
              </div>
            </div>
          </div>

          <div class="modal-footer">
            <slot name="footer">
              <button
                  class="flex w-full justify-center rounded-md border border-primary py-2 px-3 mb-2 text-sm font-semibold text-primary shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary"
                  @click="$emit('close')"
              >
                Cancelar
              </button>
              <button
                  class="flex w-full justify-center rounded-md bg-primary py-2 px-3 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary"
                  @click="newTicket"
              >
                Cadastrar
              </button>
            </slot>
          </div>
        </form>
      </div>
    </div>
  </Transition>
</template>

<script>
import TicketService from "@/services/TicketService"
import VueDatePicker from "@vuepic/vue-datepicker"
import "@vuepic/vue-datepicker/dist/main.css"
import { ptBR } from "date-fns/locale"

export default {
  props: {
    show: Boolean,
  },
  components: {
    VueDatePicker,
  },
  data() {
    return {
      clientId: null,
      clients: [],
      serviceCatalog: null,
      serviceCatalogues: [],
      department: null,
      departments: [],
      subject: null,
      description: null,
      status: "open",
      dateStart: this.formatDate(new Date()),
      dateEnd: null,
      user: null,
      localization: ptBR,
      dateFormat: (date) => {
        const day = this.inputZeroToDate(date.getDate());
        const month = this.inputZeroToDate(date.getMonth() + 1);
        const year = date.getFullYear();

        return `A data selecionada é ${day}/${month}/${year}`;
      }
    }
  },
  beforeMount() {
    this.getClients()
    this.getServiceCatalogues()
    this.getDepartments()
    this.getUser()
  },
  methods: {
    getUser() {
      this.user = JSON.parse(localStorage.getItem("user"))
    },
    async getClients() {
      const response = await TicketService.getClients()
      this.clients = response.data
    },
    async getServiceCatalogues() {
      const response = await TicketService.getServiceCatalogues()
      this.serviceCatalogues = response.data
    },
    async getDepartments() {
      const response = await TicketService.getDepartments()
      this.departments = response.data
    },
    newTicket() {
      const response = TicketService.create({
        ticket: this.createTicketNumber(),
        customer_id: 1,
        service_catalogue_id: this.serviceCatalog.id,
        department_id: this.department.id,
        subject: this.subject,
        description: this.description,
        status: "open",
        date_start: this.dateStart,
        date_end: this.dateEnd,
        user_id: this.user.id,
      })

      if (response.status === 200) {
        this.$emit("ticket-created", true)

        return
      }

      this.$emit("ticket-created", false)
    },
    getRandomInt(max) {
      return Math.floor(Math.random() * max);
    },
    setDateEnd(value) {
      this.dateEnd = value
      if (value !== null) {
        this.dateEnd = this.formatDate(value)
      }
    },
    formatDate(date) {
      return date.getFullYear() + "-" +
          this.inputZeroToDate(date.getMonth() + 1) + "-" +
          this.inputZeroToDate(date.getDate()) + " " +
          this.inputZeroToDate(date.getHours()) + ":" +
          this.inputZeroToDate(date.getMinutes())
    },
    createTicketNumber() {
      const date = new Date()
      return "#" + date.getFullYear() +
          this.inputZeroToDate(date.getMonth() + 1) +
          this.inputZeroToDate(date.getDate()) +
          this.inputZeroToDate(date.getHours()) +
          this.inputZeroToDate(date.getMinutes()) +
          this.getRandomInt(9)
    },
    inputZeroToDate(number) {
      return number < 10 ? "0" + number : number
    }
  }
}
</script>

<style>
.modal-mask {
  position: fixed;
  z-index: 9998;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  display: flex;
  transition: opacity 0.3s ease;
}

.modal-container {
  width: 30%;
  margin: auto;
  padding: 20px 30px;
  background-color: #fff;
  border-radius: 2px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.33);
  transition: all 0.3s ease;
}

.modal-body {
  margin: 20px 0;
}

.modal-default-button {
  float: right;
}

.modal-enter-from {
  opacity: 0;
}

.modal-leave-to {
  opacity: 0;
}

.modal-enter-from .modal-container,
.modal-leave-to .modal-container {
  -webkit-transform: scale(1.1);
  transform: scale(1.1);
}
</style>