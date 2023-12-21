import Dashboard from './dashboard.vue';
import Home from './home.vue';

const DashboardRoutes = [
    {
        path: '/dashboard',
        name: 'dashboard',
        component: Dashboard,
        meta: {
            breadcrumbs: [
                {
                    title: 'navigation.dashboard',
                }
            ]
        }
    },
    {
        path: '/',
        name: 'home',
        component: Home,
        meta: {
            breadcrumbs: [
                {
                    title: 'navigation.home',
                }
            ]
        }
    },
    {
        path: '/home',
        name: 'home',
        component: Home,
        meta: {
            breadcrumbs: [
                {
                    title: 'navigation.home',
                }
            ]
        }
    }
];

export default DashboardRoutes;
