import {createRouter, createWebHistory} from 'vue-router'
import AuthRoutes from "../modules/authentication/auth-routes.js";
import DashboardRoutes from "../modules/dashboard/dashboard-routes.js";
import UsersManagementRoutes from "../modules/users-management/users-management-routes.js";
import ServiceManagementRoutes from "../modules/services-management/services-management-routes.js";
import SettingsRoutes from "../modules/settings/settings-routes.js";
import store from "@/store/store.js";
import {notify} from "@kyvg/vue3-notification";
import i18n from "@/plugins/i18n.js";

const routes = [
    ...SettingsRoutes,
    ...UsersManagementRoutes,
    ...DashboardRoutes,
    ...AuthRoutes,
    ...ServiceManagementRoutes,
    {
        path: "/:catchAll(.*)",
        name: "NotFound",
        redirect: {name: 'dashboard'},
        meta: {
            requiresAuth: false
        }
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

router.beforeEach((to, from, next) => {
    const publicPages = ['/login'];
    const authRequired = !publicPages.includes(to.path);
    const loggedIn = store.state.auth.status.loggedIn;
    // trying to access a restricted page + not logged in
    // redirect to login page
    if (authRequired && !loggedIn) {
        next('/login');
    } else if (authRequired && loggedIn) {
        if ((to.name === 'dashboard') || store.state.auth.user.permissions.includes(to.name)) {
            next();
        } else {
            notify(i18n.global.t('unauthorized'));
            next('/');
        }
    } else {
        if (!authRequired && loggedIn && to.path === '/login')
            next('/')
        next();
    }
});

export default router;
