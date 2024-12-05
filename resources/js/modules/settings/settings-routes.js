const AddressesIndex = () => import("@/modules/settings/addresses/index.vue");
const AddressCreate = () => import("@/modules/settings/addresses/create.vue");
const AddressUpdate = () => import("@/modules/settings/addresses/update.vue");
const AddressDetail = () => import("@/modules/settings/addresses/details.vue");

const SettingsRoutes = [
    {
        path: '/addresses',
        name: 'addresses',
        component: AddressesIndex,
        meta: {
            breadcrumb: 'addresses'
        }
    },
    {
        path: '/addresses/create',
        name: 'addresses/create',
        component: AddressCreate
    },
    {
        path: "/addresses/:id/update",
        name: 'addresses/update',
        component: AddressUpdate,
        props: true
    },
    {
        path: "/addresses/:id/details",
        name: 'addresses/details',
        component: AddressDetail,
        props: true,
        meta: {
            breadcrumb: 'addresses.details'
        }
    }
];

export default SettingsRoutes;
