<template>
    <v-container>
        <t-breadcrumbs
            :path="router.currentRoute.value.path"
            :title="router.currentRoute.value.meta.breadcrumb"
            :reset="true"
        >
        </t-breadcrumbs>
    </v-container>
    <v-container class="container">
        <h3> {{ $t('roles.roles') }}</h3>
        <v-divider :thickness="2" class="mt-3 mb-4"></v-divider>
        <v-btn
            v-if="userPermissions.includes('roles/create')"
            :class="'float-'+$t('right') + ' colored-btn'" :to="{ name: 'roles/create' }">
            <span class="px-2">{{ $t('roles.add') }}</span>
            <img class="crud-icon" src="@/assets/icons/ic_add_2.svg">
        </v-btn>
        <div class="dt-w-1/2 sm:dt-w-full overflow-hidden">
            <data-table :rows="tableData"
                        :pagination="pagination"
                        :query="query"
                        :loading="isLoading"
                        hoverable
                        filter
                        @loadData="loadData"
            >
                <template #thead>
                    <table-head>{{ $t('name_en') }}</table-head>
                    <table-head>{{ $t('name_ar') }}</table-head>
                    <table-head>{{ $t('actions') }}</table-head>
                </template>

                <template #tbody="{row}">
                    <table-body v-text="row.name"/>
                    <table-body v-text="row.name_ar"/>
                    <table-body>
                        <div class="crud-actions-container">
                            <button
                                v-if="userPermissions.includes('roles/details')"
                                class="crud-action-btn">
                                <router-link :to="{ name: 'roles/details', params: { id: row.id } }"
                                             class="btn btn-warning">
                                    <img alt="view" src="@/assets/icons/ic_view.svg">
                                </router-link>
                            </button>
                            <button
                                v-if="userPermissions.includes('roles/update')"
                                class="crud-action-btn">
                                <router-link :to="{ name: 'roles/update', params: { id: row.id } }">
                                    <img alt="edit" src="@/assets/icons/ic_edite.svg">
                                </router-link>
                            </button>
                            <button
                                v-if="userPermissions.includes('roles/delete')"
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
import useRoles from "../composables/roles.js";
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
} = useRoles()
</script>
