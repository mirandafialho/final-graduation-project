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

    list() {
        return http.get("/tickets")
    }

    view(id) {
        return http.get("/tickets/" + id)
    }

    create(data) {
        return http.post("/tickets", data)
    }

    update(data, id) {
        return http.put("/tickets/" + id, data)
    }

    delete(id) {
        return http.delete("/tickets/" + id)
    }
}

export default new TicketService()