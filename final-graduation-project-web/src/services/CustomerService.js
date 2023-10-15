import http from "../plugins/axios"

class CustomerService {
    list() {
        return http.get("/customers")
    }

    view(id) {
        return http.get("/customers/" + id)
    }

    create(data) {
        return http.post("/customers", data)
    }

    update(data, id) {
        return http.put("/customers/" + id, data)
    }

    delete(id) {
        return http.delete("/customers/" + id)
    }
}

export default new CustomerService()