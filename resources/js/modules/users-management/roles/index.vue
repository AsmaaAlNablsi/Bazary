<template>
    <v-breadcrumbs :items="router.currentRoute.value.meta.breadcrumbs">
        <template v-slot:title="{ item }">
            {{ $t(item.title) }}
        </template>
    </v-breadcrumbs>
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
            <t-data-table
                :rows="tableData"
                :pagination="pagination"
                :query="query"
                :loading="isLoading"
                :userPermissions="userPermissions"
                :cols="roleCols"
                :actions="roleActions"
                @loadData="loadData"
            >
            </t-data-table>
        </div>
    </v-container>
</template>

<script setup>
import useRoles from "../composables/roles.js";
import TDataTable from "@/shared/components/t-data-table.vue";

const {
    tableData,
    pagination,
    query,
    isLoading,
    loadData,
    deleteItem,
    router,
    userPermissions,
    roleCols,
    roleActions
} = useRoles()
</script>
