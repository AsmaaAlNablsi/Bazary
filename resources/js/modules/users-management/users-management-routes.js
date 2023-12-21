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
            breadcrumbs: [
                {
                    title: 'navigation.home',
                    to: '/'
                },
                {
                    title: 'users.users'
                }
            ]
        }
    },
    {
        path: '/users/create',
        name: 'users/create',
        component: UsersCreate,
        meta: {
            breadcrumbs: [
                {
                    title: 'navigation.home',
                    to: '/'
                },
                {
                    title: 'users.users',
                    to: '/users'
                },
                {
                    title: 'users.add',
                }
            ]
        }
    },
    {
        path: "/users/:id/update",
        name: 'users/update',
        component: UsersUpdate,
        props: true,
        meta: {
            breadcrumbs: [
                {
                    title: 'navigation.home',
                    to: '/'
                },
                {
                    title: 'users.users',
                    to: '/users'
                },
                {
                    title:'users.edit',
                }
            ]
        }
    },
    {
        path: "/users/:id/details",
        name: 'users/details',
        component: UsersDetail,
        props: true,
        meta: {
            breadcrumbs: [
                {
                    title: 'navigation.home',
                    to: '/'
                },
                {
                    title: 'users.users',
                    to: '/users'
                },
                {
                    title: 'users.details',
                }
            ]
        }
    },
    {
        path: '/roles',
        name: 'roles',
        component: RolesIndex,
        meta: {
            breadcrumbs: [
                {
                    title: 'navigation.home',
                    to: '/'
                },
                {
                    title: 'roles.roles'
                }
            ]
        }
    },
    {
        path: '/roles/create',
        name: 'roles/create',
        component: RolesCreate,
        meta: {
            breadcrumbs: [
                {
                    title: 'navigation.home',
                    to: '/'
                },
                {
                    title: 'roles.roles',
                    to: '/roles'
                },
                {
                    title: 'roles.add',
                }
            ]
        }
    },
    {
        path: "/roles/:id/update",
        name: 'roles/update',
        component: RolesUpdate,
        props: true,
        meta: {
            breadcrumbs: [
                {
                    title: 'navigation.home',
                    to: '/'
                },
                {
                    title: 'roles.roles',
                    to: '/roles'
                },
                {
                    title: 'roles.edit',
                }
            ]
        }
    },
    {
        path: "/roles/:id/details",
        name: 'roles/details',
        component: RolesDetail,
        props: true,
        meta: {
            breadcrumbs: [
                {
                    title: 'navigation.home',
                    to: '/'
                },
                {
                    title: 'roles.roles',
                    to: '/roles'
                },
                {
                    title: 'roles.details',
                }
            ]
        }
    }
];


export default UsersManagementRoutes;
