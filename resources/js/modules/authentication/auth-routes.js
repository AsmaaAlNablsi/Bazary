import Login from '../authentication/auth/login.vue';
const Profile = () => import("../authentication/auth/profile.vue")

const AuthRoutes = [
    {
        path: '/profile',
        name: 'profile',
        component: Profile,
        meta: {
            title: 'Profile',
        }
    },
    {
        path: '/login',
        name: 'login',
        component: Login,
        meta: {
            title: 'Login',
        }
    },
];

export default AuthRoutes;
