import BaseService from "./base-service";

class SpecialtiesService extends BaseService {
    routPath = '/specialties';

    constructor() {
        super();
    }
}

export default new SpecialtiesService();
