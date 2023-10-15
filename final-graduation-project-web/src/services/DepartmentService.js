import http from "../plugins/axios"

class DepartmentService {
    list() {
        return http.get("/departments")
    }

    view(id) {
        return http.get("/departments/" + id)
    }

    create(data) {
        return http.post("/departments", data)
    }

    update(data, id) {
        return http.put("/departments/" + id, data)
    }

    delete(id) {
        return http.delete("/departments/" + id)
    }
}

export default new DepartmentService()