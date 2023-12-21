import BaseService from "./base-service";
import axios from "axios";
import authHeader from "@/services/auth-header.js";

class GeneralCodesService extends BaseService {
    routPath = '/general-codes';

    constructor() {
        super();
    }

    index(params) {
        return axios.get(this.routPath + '?parent_id=' + params.parent_id +
            '&page=' + params.page +
            "&limit=" + params.size +
            "&search=" + params.search
            , {headers: authHeader()}
        );
    }

    codes(code) {
        return axios.get(this.routPath +'/codes/'+ code, {headers: authHeader()});
    }

}

export default new GeneralCodesService();
