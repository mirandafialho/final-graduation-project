import http from 'axios';

function login() {
    return http.post('/login', json);
}