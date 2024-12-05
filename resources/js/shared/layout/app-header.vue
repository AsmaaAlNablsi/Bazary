<template >
    <v-app-bar flat class="header-nav">
        <v-app-bar-nav-icon
        class="hidden-lg-and-up"
        variant="text" @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
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
<script setup>
import store from "../../store/store.js";
import LocaleSwitcher from "../components/locale-switcher.vue";
import router from "@/helpers/router.js";

const logOut = () => {
  store.dispatch("auth/logout");
  router.push("/login");
};
const drawer = defineModel("drawer", {type: Boolean});
</script>
