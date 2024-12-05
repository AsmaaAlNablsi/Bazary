<template >
    <v-app-bar flat class="header-nav">
        <v-toolbar-title>
            <router-link to="/">
                <img class="header-logo" src="@/assets/logo/logo.png">
            </router-link>
        </v-toolbar-title>

        <v-spacer></v-spacer>
        <v-container class="w-0 d-flex align-items-center justify-end me-5">
            <LocaleSwitcher />

            <div v-if="$store.state.auth.status.loggedIn" @click="logOut" class="header-btn-container  mx-3">
                <img class="header-btn" src="@/assets/icons/ic_logout_en.svg">
            </div>
        </v-container>


    </v-app-bar>
</template>
<script>
import LocaleSwitcher from "../components/locale-switcher.vue"

export default {
    name: 'app-header',
    components: { LocaleSwitcher },
    methods: {
        logOut() {
            this.$store.dispatch('auth/logout');
            this.$router.push('/login');
        }
    }
}
</script>
