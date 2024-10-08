import UsersIndex from './users/index.vue';
import UsersCreate from './users/create.vue';
import UsersUpdate from './users/update.vue';
import UsersDetail from './users/details.vue';
import RolesIndex from './roles/index.vue';
import RolesCreate from './roles/create.vue';
import RolesUpdate from './roles/update.vue';
import RolesDetail from './roles/details.vue';

const UsersManagementRoutes = [
    {
        path: '/users',
        name: 'users',
        component: UsersIndex,
        meta: {
            breadcrumb: 'users.users'
        }
    },
    {
        path: '/users/create',
        name: 'users/create',
        component: UsersCreate, 
        meta: {
            breadcrumb: 'users.add'
        }
    }, 
    {
        path: "/users/:id/update",
        name: 'users/update',
        component: UsersUpdate,
        props: true,
        meta: {
            breadcrumb: 'users.edit'
        }
    },
    {
        path: "/users/:id/details",
        name: 'users/details',
        component: UsersDetail,
        props: true,
        meta: {
            breadcrumb: 'users.details'
        }
    },
    {
        path: '/roles',
        name: 'roles',
        component: RolesIndex,
        meta: {
            breadcrumb: 'roles.roles'
        }
    },
    {
        path: '/roles/create',
        name: 'roles/create',
        component: RolesCreate,
        meta: {
            breadcrumb: 'roles.add'
        }
    },
    {
        path: "/roles/:id/update",
        name: 'roles/update',
        component: RolesUpdate,
        props: true,
        meta: {
            breadcrumb: 'roles.edit'
        }
    },
    {
        path: "/roles/:id/details",
        name: 'roles/details',
        component: RolesDetail,
        props: true,
        meta: {
            breadcrumb: 'roles.details'
        }
    }
];


export default UsersManagementRoutes;
