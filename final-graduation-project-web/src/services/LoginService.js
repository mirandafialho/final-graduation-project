import http from "../plugins/axios"

class LoginService {
    login(data) {
        http.post("/login", data)
            .then(response => {
                const token = response.data.access_token
                localStorage.setItem("access_token", token)
                this.user()
            })
            .catch(error => {
                console.error(error)
            })
    }

    logout() {
        return http.post("/logout")
    }

    user() {
        http.get("/user", {
            headers: {
                "Accept": "application/json",
                "Content-Type": "application/json",
                "Authorization": "Bearer " + localStorage.getItem("access_token")
            }
        })
            .then(response => {
                localStorage.setItem("user", JSON.stringify(response.data))
            })
            .catch(error => {
                console.error(error)
            })
    }
}

export default new LoginService()