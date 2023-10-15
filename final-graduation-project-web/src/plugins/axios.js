import axios from "axios"

export default axios.create({
    baseURL: "http://back.localhost/api",
    timeout: 1000,
    headers: {
	"Accept": "application/json",
	"Content-Type": "application/json",
	"Authorization": "Bearer " + localStorage.getItem("access_token")
    }
})
