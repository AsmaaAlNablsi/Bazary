import axios from 'axios';
import authHeader from "./auth-header.js";

axios.defaults.baseURL = '/api';

const routPath = '/';
export default class BaseService {

    lang() {
        return axios.get('/lang', {headers: authHeader()});
    }

    index(params, showLoader) {
        return axios.get(this.routPath + '?page=' + params.page +
            "&limit=" + params.size + "&search=" + params.search
            , {headers: authHeader(), showLoader: showLoader}
        );
    }
    detailsIndex(id, params){
        return axios.get(this.routPath + '/details/' + id + '?page=' + params.page +
        "&limit=" + params.size + "&search=" + params.search
        , {headers: authHeader(), showLoader: showLoader}
    );

    }
    show(id, showLoader) {
        return axios.get(this.routPath + '/' + id
            , {headers: authHeader(), showLoader});
    }

    store(obj, showLoader) {
        return axios.post(this.routPath, obj, {headers: authHeader(), showLoader});
    }

    update(obj, id, showLoader) {
        return axios.put(this.routPath + '/' + id, obj, {headers: authHeader(), showLoader});
    }

    destroy(id, showLoader) {
        return axios.delete(this.routPath + '/' + id, {headers: authHeader(), showLoader});
    }

    toggleActivation(id) {
        return axios.post(this.routPath + '/toggle-activation/' + id, {headers: authHeader()});
    }
}
