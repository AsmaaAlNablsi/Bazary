import cookie from "vue-cookies";

export default function authHeader() {
    let user = cookie.get('user');

    if (user && user.accessToken) {
        return {
            Authorization: 'Bearer ' + user.accessToken,
            Accept: 'application/json',
            'Accept-Language': localStorage.getItem('lang')
        };
    } else {
        return {
            Accept: 'application/json',
            'Accept-Language': localStorage.getItem('lang')
        };
    }
}
