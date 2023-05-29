import http from "../plugins/axios"

class TicketService {
    async getClients() {
        return await http.get("/clients")
    }

    async getServiceCatalogues() {
        return await http.get("/service-catalogues")
    }

    async getDepartments() {
        return await http.get("/departments")
    }

    create(data) {
        return http.post("/tickets", data)
    }
}

export default new TicketService()