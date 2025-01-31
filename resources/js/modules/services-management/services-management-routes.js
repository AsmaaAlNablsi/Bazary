const SpecialtiesIndex = () => import("./specialties/index.vue");
const SpecialtyCreate = () => import("./specialties/create.vue");
const SpecialtyUpdate = () => import("./specialties/update.vue");
const SpecialtyDetail = () => import("./specialties/details.vue");

const ServiceManagementRoutes = [
    {
        path: '/specialties',
        name: 'specialties',
        component: SpecialtiesIndex,
        props: true,
        meta: {
            breadcrumb: 'specialties.specialties'
        }
    },
    {
        path: '/specialties/create',
        meta: {
            breadcrumb: 'specialties.create'
        },
        name: 'specialties/create',
        component: SpecialtyCreate
    },
    {
        path: "/specialties/:id/update",
        name: 'specialties/update',
        component: SpecialtyUpdate,
        meta: {
            breadcrumb: 'specialties.edit'
        },
        props: true
    },
    {
        path: "/specialties/:id/details",
        name: 'specialties/details',
        component: SpecialtyDetail,
        props: true,
        meta: {
            breadcrumb: 'specialties.details'
        }
    }
];

export default ServiceManagementRoutes;
