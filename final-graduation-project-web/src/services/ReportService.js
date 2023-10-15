import http from "../plugins/axios"

class ReportService {
    list() {
        return http.get("/reports")
    }

    view(id) {
        return http.get("/reports/" + id)
    }

    create(data) {
        return http.post("/reports", data)
    }

    update(data, id) {
        return http.put("/reports/" + id, data)
    }

    delete(id) {
        return http.delete("/reports/" + id)
    }
}

export default new ReportService()