<template>
    <v-navigation-drawer floating permanent
                         class="spacing-playground pa-2"
                         color="white"
                         width="304">
        <v-list density="compact" nav class="py-0">
            <v-list-item class="white-image"
                         v-if="$store.state.auth.status.loggedIn" to="/profile">
                <div class="colored-btn profile-icon">
                    <img src="@/assets/icons/ic_profile.svg">
                </div>
                <span class="user-name px-3 text-shades-black"> {{ currentUser.first_name }}</span>
            </v-list-item>
            <v-divider :thickness="2" class="mb-3 mt-2"></v-divider>
            <v-list-item v-if="$store.state.auth.status.loggedIn"
                         to="/dashboard">
                <img src="@/assets/icons/ic_dashboard.svg">
                <span class="px-3"> {{ $t('navigation.dashboard') }}</span>
            </v-list-item>
            <v-list-group
                v-if="currentUser.permissions.includes('users') || currentUser.permissions.includes('roles')"
                value="users_management">
                <template v-slot:activator="{props}">
                    <v-list-item v-bind="props">
                        <img src="@/assets/icons/ic_Customer_management.svg">
                        <span class="px-3"> {{ $t('navigation.users_roles_management') }}</span>
                    </v-list-item>
                </template>
                <v-list-item
                    v-if="currentUser.permissions.includes('users')"
                    to="/users">
                    <span class="px-3"> {{ $t('navigation.users_management') }}</span>
                </v-list-item>
                <v-list-item
                    v-if="currentUser.permissions.includes('roles')"
                    to="/roles">
                    <span class="px-3"> {{ $t('navigation.roles_management') }}</span>
                </v-list-item>
            </v-list-group>
            <v-list-group
                v-if="currentUser.permissions.includes('addresses') ||
                currentUser.permissions.includes('general-codes')"
                value="settings">
                <template v-slot:activator="{props}">
                    <v-list-item v-bind="props">
                        <img src="@/assets/icons/ic_setting.svg">
                        <span class="px-3"> {{ $t('navigation.settings') }}</span>
                    </v-list-item>
                </template>
                <v-list-item
                    v-if="currentUser.permissions.includes('addresses')"
                    to="/addresses">
                    <span class="px-3"> {{ $t('navigation.addresses') }}</span>
                </v-list-item>
                <v-list-item
                    v-if="currentUser.permissions.includes('general-codes')"
                    to="/general-codes">
                    <span class="px-3"> {{ $t('navigation.general_codes') }}</span>
                </v-list-item>
            </v-list-group>
        </v-list>
    </v-navigation-drawer>
</template>

<script>

export default {
    name: "app-navigation",
    data() {
    },
    computed: {
        currentUser() {
            return this.$store.state.auth.user;
        }
    },
    methods: {}
}
</script>
