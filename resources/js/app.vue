<template>
    <v-app v-if="$store.state.auth.status.loggedIn">
        <v-container class="px-0 py-0">
            <app-header v-model:drawer="drawer" />
            <app-navigation v-model:drawer="drawer" />
        </v-container>
        <v-main class="flex-0-0">
            <notifications :position="'top '+$t('right')" />
            <div class="main-div">
                <v-card width="95%" class="pa-5 mx-auto layout-card" color="white" outlined>
                    <t-loader></t-loader>
                    <router-view :key="$route.fullPath"></router-view>
                </v-card>
            </div>
        </v-main>
        <app-footer class="py-0 justify-center" />
        <DialogsWrapper />
    </v-app>
    <router-view v-if="!$store.state.auth.status.loggedIn"></router-view>

</template>

<script>
import AppNavigation from "./shared/layout/app-navigation.vue";
import AppFooter from "./shared/layout/app-footer.vue";
import AppHeader from "./shared/layout/app-header.vue";
import TLoader from "./shared/components/t-loader.vue";

export default {
    name: "App",
    data() {
        return {
            drawer: true
        }
    },
    components: { AppHeader, AppFooter, AppNavigation, TLoader },
    mounted() {
        const localLang = localStorage.getItem("lang");
        if (localStorage.getItem("lang")) {
            this.$i18n.locale = localLang;
            localStorage.setItem("lang", localLang);
        } else localStorage.setItem("lang", this.$i18n.locale);
    }
}
</script>
