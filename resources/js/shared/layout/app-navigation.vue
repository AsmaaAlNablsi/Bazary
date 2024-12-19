<template>
    <v-navigation-drawer
        class="spacing-playground pa-2"
        color="white"
        width="312"
        v-model="drawer"
        :rail="rail"
        @click="rail = false"
    >
        <v-list density="compact" nav class="py-0">
            <v-list-item
                class="white-image"
                v-if="$store.state.auth.status.loggedIn"
                to="/profile"
            >
                <div class="colored-btn profile-icon">
                    <img src="@/assets/icons/ic_profile.svg" />
                </div>
                <span class="user-name px-3 text-shades-black">
                    {{ currentUser.first_name }}</span
                >
            </v-list-item>
            <v-divider :thickness="2" class="mb-3 mt-2"></v-divider>
            <v-list-item v-if="$store.state.auth.status.loggedIn" to="/">
                <img src="@/assets/icons/ic_dashboard.svg" />
                <span class="px-3"> {{ $t("navigation.dashboard") }}</span>
            </v-list-item>
            <v-list-group
                v-if="
                    currentUser.permissions.includes('users') ||
                    currentUser.permissions.includes('roles')
                "
                value="users_management"
            >
                <template v-slot:activator="{ props }">
                    <v-list-item v-bind="props">
                        <img src="@/assets/icons/ic_Customer_management.svg" />
                        <span class="px-3">
                            {{ $t("navigation.users_roles_management") }}</span
                        >
                    </v-list-item>
                </template>
                <v-list-item
                    v-if="currentUser.permissions.includes('users')"
                    to="/users"
                >
                    <span class="px-3">
                        {{ $t("navigation.users_management") }}</span
                    >
                </v-list-item>
                <v-list-item
                    v-if="currentUser.permissions.includes('roles')"
                    to="/roles"
                >
                    <span class="px-3">
                        {{ $t("navigation.roles_management") }}</span
                    >
                </v-list-item>
            </v-list-group>
            <v-list-group
                v-if="
                    currentUser.permissions.includes('addresses') ||
                    currentUser.permissions.includes('general-codes')
                "
                value="settings"
            >
                <template v-slot:activator="{ props }">
                    <v-list-item v-bind="props">
                        <img src="@/assets/icons/ic_setting.svg" />
                        <span class="px-3">
                            {{ $t("navigation.settings") }}</span
                        >
                    </v-list-item>
                </template>
                <v-list-item
                    v-if="currentUser.permissions.includes('addresses')"
                    to="/addresses"
                >
                    <span class="px-3"> {{ $t("navigation.addresses") }}</span>
                </v-list-item>
                <v-list-item
                    v-if="currentUser.permissions.includes('general-codes')"
                    to="/general-codes"
                >
                    <span class="px-3">
                        {{ $t("navigation.general_codes") }}</span
                    >
                </v-list-item>
            </v-list-group>
        </v-list>
        <div class="nav-footer">
                <v-divider :thickness="2" class="mb-3 mt-2"></v-divider>
                <div class="nav-footer-content font-weight-bold">
                    <a href="https://tatweer.sy" target="_blank">
                        <div>
                            {{ $t("navigation.powered_by") }}
                            <!-- <span class="tw-footer-span">{{ $t('navigation.tatweer') }}</span> -->
                        </div>
                        <div class="logo-img">
                            <img src="@/assets/logo/tatweer-logo.png" />
                        </div>
                    </a>
                </div>
            </div>
    </v-navigation-drawer>
</template>

<script setup>
import { ref } from "vue";
import store from "../../store/store.js";

const currentUser = ref(store.state.auth.user);

const drawer = defineModel("drawer", { type: Boolean });
const rail = ref(false);
</script>

