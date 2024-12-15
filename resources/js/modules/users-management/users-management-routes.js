const UsersIndex = () => import ('./users/index.vue');
const UsersCreate = () => import ('./users/create.vue');
const UsersUpdate = () => import ('./users/update.vue');
const UsersDetail = () => import ('./users/details.vue');
const RolesIndex = () => import ('./roles/index.vue');
const RolesCreate = () => import ('./roles/create.vue');
const RolesUpdate = () => import ('./roles/update.vue');
const RolesDetail = () => import ('./roles/details.vue');


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
