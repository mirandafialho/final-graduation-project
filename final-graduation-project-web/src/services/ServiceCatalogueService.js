import http from "../plugins/axios"

class ServiceCatalogueService {
    list() {
        return http.get("/service-catalogues")
    }

    view(id) {
        return http.get("/service-catalogues/" + id)
    }

    create(data) {
        return http.post("/service-catalogues", data)
    }

    update(data, id) {
        return http.put("/service-catalogues/" + id, data)
    }

    delete(id) {
        return http.delete("/service-catalogues/" + id)
    }
}

export default new ServiceCatalogueService()