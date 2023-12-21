import BaseService from "./base-service";
import axios from "axios";
import authHeader from "@/services/auth-header.js";

class RolesService extends BaseService {
    routPath = '/roles';

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
}

export default new RolesService();
