import BaseService from "./base-service";

class CategoriesService extends BaseService {
    routPath = '/categories';

    constructor() {
        super();
    }
}

export default new CategoriesService();
