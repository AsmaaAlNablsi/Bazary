import CategoriesManagementRoutes from "@/modules/categories/categories-management-routes";

const categoryIndex = () => import("@/modules/categories/categories/index.vue");
const categoryCreate = () => import("@/modules/categories/categories/create.vue");
const categoryUpdate = () => import("@/modules/categories/categories/update.vue");
const categoryDetail = () => import("@/modules/categories/categories/details.vue");

const CategoriesManagementRoutes = [
    {
        path: '/categories/:id?',
        name: 'categories',
        component: categoryIndex,
        props: true,
        meta: {
            breadcrumb: 'categories.categories'
        }
    },
    {
        path: '/categories/create',
        name: 'categories/create',
        component: categoryCreate
    },
    {
        path: "/categories/:id/update",
        name: 'categories/update',
        component: categoryUpdate,
        props: true
    },
    {
        path: "/categories/:id/details",
        name: 'categories/details',
        component: categoryDetail,
        props: true,
        meta: {
            breadcrumb: 'categories.details'
        }
    }
];

export default CategoriesManagementRoutes;
