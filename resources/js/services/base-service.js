import axios from 'axios';
import authHeader from "./auth-header.js";

axios.defaults.baseURL = '/api';

const routPath = '/';
export default class BaseService {

    lang() {
        return axios.get('/lang', {headers: authHeader()});
    }

    index(params) {
        return axios.get(this.routPath + '?page=' + params.page +
            "&limit=" + params.size + "&search=" + params.search
            , {headers: authHeader()}
        );
    }
    detailsIndex(id, params){
        return axios.get(this.routPath + '/details/' + id + '?page=' + params.page +
        "&limit=" + params.size + "&search=" + params.search
        , {headers: authHeader()}
    );

    }
    show(id) {
        return axios.get(this.routPath + '/' + id
            , {headers: authHeader()});
    }

    store(obj) {
        return axios.post(this.routPath, obj, {headers: authHeader()});
    }

    update(obj, id) {
        return axios.put(this.routPath + '/' + id, obj, {headers: authHeader()});
    }

    destroy(id) {
        return axios.delete(this.routPath + '/' + id, {headers: authHeader()});
    }

    toggleActivation(id) {
        return axios.post(this.routPath + '/toggle-activation/' + id, {headers: authHeader()});
    }
}
