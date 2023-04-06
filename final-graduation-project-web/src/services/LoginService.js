import http from '../plugins/axios'

class LoginService {
    login(data) {
        return http.post('/login', data)
    }

    logout() {
        return http.post('/logout')
    }
}

export default new LoginService()