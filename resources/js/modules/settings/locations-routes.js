const AddressesIndex = () => import("@/modules/settings/locations/index.vue");
const AddressCreate = () => import("@/modules/settings/locations/create.vue");
const AddressUpdate = () => import("@/modules/settings/locations/update.vue");
const AddressDetail = () => import("@/modules/settings/locations/details.vue");

const LocationsRoutes = [
    {
        path: '/locations/:id?',
        name: 'locations',
        component: AddressesIndex,
        props: true,
        meta: {
            breadcrumb: 'locations.locations'
        }
    },
    {
        path: '/locations/create',
        name: 'locations/create',
        component: AddressCreate
    },
    {
        path: "/locations/:id/update",
        name: 'locations/update',
        component: AddressUpdate,
        props: true
    },
    {
        path: "/locations/:id/details",
        name: 'locations/details',
        component: AddressDetail,
        props: true,
        meta: {
            breadcrumb: 'locations.details'
        }
    }
];

export default LocationsRoutes;
