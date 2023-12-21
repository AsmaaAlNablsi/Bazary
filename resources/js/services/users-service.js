import BaseService from "./base-service";

class UsersService extends BaseService {
    routPath = '/users';

    constructor() {
        super();
    }
}

export default new UsersService();
