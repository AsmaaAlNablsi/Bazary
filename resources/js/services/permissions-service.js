import BaseService from "./base-service";
import axios from "axios";
import authHeader from "@/services/auth-header.js";

class PermissionsService extends BaseService {
    routPath = '/permissions';

    constructor() {
        super();
    }

    index(params, showLoader) {
        return axios.get(this.routPath + '?parent_id=' + params.parent_id +
            '&page=' + params.page +
            "&limit=" + params.size +
            "&search=" + params.search
            , {headers: authHeader(), showLoader}
        );
    }
}

export default new PermissionsService();
