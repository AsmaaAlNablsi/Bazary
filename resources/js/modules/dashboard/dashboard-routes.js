const Dashboard  = () => import('./dashboard.vue');

const DashboardRoutes = [
    {
        path: '/',
        name: 'dashboard',
        component: Dashboard,
        meta: {
            breadcrumb: 'navigation.dashboard'
        }
    }
];

export default DashboardRoutes;
