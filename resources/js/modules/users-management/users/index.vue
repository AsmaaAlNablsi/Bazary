<template>
    <v-container>
        <t-breadcrumbs
            :path="router.currentRoute.value.path"
            :title="router.currentRoute.value.meta.breadcrumb"
            :reset="true"
        >
        </t-breadcrumbs>
    </v-container>
    <v-container>
        <h3> {{ $t('users.users') }}</h3>
        <v-divider :thickness="2" class="mt-3 mb-4"></v-divider>
        <v-btn
            v-if="userPermissions.includes('users/create')"
            :class="'float-' + $t('right') + ' colored-btn'" :to="{ name: 'users/create' }">
            <span class="px-2">{{ $t('users.add') }}</span>
            <img class="crud-icon" src="@/assets/icons/ic_add_2.svg">
        </v-btn>
        <div class="dt-w-1/2 sm:dt-w-full overflow-hidden">
            <data-table :rows="tableData" :pagination="pagination" :query="query" :loading="isLoading" hoverable filter
                        @loadData="loadData">
                <template #thead>
                    <table-head>{{ $t('users.first_name') }}</table-head>
                    <table-head>{{ $t('users.last_name') }}</table-head>
                    <table-head>{{ $t('users.email') }}</table-head>
                    <table-head>{{ $t('users.is_active') }}</table-head>
                    <table-head>{{ $t('actions') }}</table-head>
                </template>

                <template #tbody="{ row }">
                    <table-body v-text="row.first_name"/>
                    <table-body v-text="row.last_name"/>
                    <table-body v-text="row.email"/>
                    <table-body>
                        <p v-text="$t('is_active.' + row.is_active)"/>
                    </table-body>
                    <table-body>
                        <div class="crud-actions-container">
                            <button
                                v-if="userPermissions.includes('users/details')"
                                class="crud-action-btn">
                                <router-link :to="{ name: 'users/details', params: { id: row.id } }"
                                             class="btn btn-warning">
                                    <img alt="view" src="@/assets/icons/ic_view.svg">
                                </router-link>
                            </button>
                            <button
                                v-if="userPermissions.includes('users/update')"
                                class="crud-action-btn">
                                <router-link :to="{ name: 'users/update', params: { id: row.id } }">
                                    <img alt="edit" src="@/assets/icons/ic_edite.svg">
                                </router-link>
                            </button>
                            <button
                                v-if="userPermissions.includes('users/delete')"
                                class="crud-action-btn" @click="deleteItem(row.id)">
                                <img alt="delete" src="@/assets/icons/ic_delete.svg">
                            </button>
                        </div>
                    </table-body>
                </template>
            </data-table>
        </div>
    </v-container>
</template>

<script setup>
import useUsers from "../composables/users.js";

import TBreadcrumbs from "@/shared/components/t-breadcrumbs.vue";

const {
    tableData,
    pagination,
    query,
    isLoading,
    loadData,
    deleteItem,
    router,
    userPermissions
} = useUsers()
</script>
