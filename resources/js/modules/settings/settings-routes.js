import AddressesIndex from "@/modules/settings/addresses/index.vue";
import AddressCreate from "@/modules/settings/addresses/create.vue";
import AddressUpdate from "@/modules/settings/addresses/update.vue";
import AddressDetail from "@/modules/settings/addresses/details.vue";

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
