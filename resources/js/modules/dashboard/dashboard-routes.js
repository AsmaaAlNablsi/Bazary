import Dashboard from './dashboard.vue';

const DashboardRoutes = [
    {
        path: '/',
        name: 'dashboard',
        component: Dashboard,
        meta: {
            breadcrumbs: [
                {
                    title: 'navigation.dashboard',
                }
            ]
        }
    }
];

export default DashboardRoutes;
