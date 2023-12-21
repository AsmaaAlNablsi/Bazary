import axios from 'axios';
import cookie from "vue-cookies";
import authHeader from "./auth-header.js";

class AuthService {
    login(user) {
        return axios.post('/login', {
            email: user.email,
            password: user.password
        }, {headers: authHeader()})
            .then(response => {
                    if (response.data.data.accessToken) {
                        cookie.set('user', JSON.stringify(response.data.data));
                    }
                    return response.data.data;
                }
            );
    }

    logout() {
        return axios.post('/logout', {}, {headers: authHeader()})
            .then(response => {
                    cookie.remove('user');
                }
            );
    }
}

export default new AuthService();
