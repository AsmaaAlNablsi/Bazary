import GeneralCodesIndex from "@/modules/settings/general-codes/index.vue";
import GeneralCodeCreate from "@/modules/settings/general-codes/create.vue";
import GeneralCodeDetails from "@/modules/settings/general-codes/details.vue";
import GeneralCodeUpdate from "@/modules/settings/general-codes/update.vue";
import AddressesIndex from "@/modules/settings/addresses/index.vue";
import AddressCreate from "@/modules/settings/addresses/create.vue";
import AddressUpdate from "@/modules/settings/addresses/update.vue";
import AddressDetail from "@/modules/settings/addresses/details.vue";

const SettingsRoutes = [
    {
        path: '/general-codes',
        name: 'general-codes',
        component: GeneralCodesIndex,
        meta: {
            breadcrumbs: [
                {
                    title: 'navigation.home',
                    to: '/'
                },
                {
                    title: 'general_codes.general_codes'
                }
            ]
        }
    },
    {
        path: '/general-codes/create',
        name: 'general-codes/create',
        component: GeneralCodeCreate
    },
    {
        path: '/general-codes/:id/details',
        name: 'general-codes/details',
        component: GeneralCodeDetails,
        props: true,
        meta: {
            breadcrumbs: [
                {
                    title: 'navigation.home',
                    to: '/'
                },
                {
                    title: 'general_codes.general_codes',
                    to: '/general-codes'
                },
                {
                    title: 'general_codes.details',
                }
            ]
        }
    },
    {
        path: '/general-codes/:id/update',
        name: 'general-codes/update',
        component: GeneralCodeUpdate,
        props: true
    },
    {
        path: '/addresses',
        name: 'addresses',
        component: AddressesIndex,
        meta: {
            breadcrumbs: [
                {
                    title: 'navigation.home',
                    to: '/'
                },
                {
                    title: ''
                }
            ]
        }
    },
    {
        path: '/addresses/create',
        name: 'addresses/create',
        component: AddressCreate,
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
            breadcrumbs: [
                {
                    title: 'navigation.home',
                    to: '/'
                },
                {
                    title: 'addresses.addresses',
                    to: '/addresses'
                },
                {
                    title: 'addresses.details',
                }
            ]
        }
    }
];

export default SettingsRoutes;
