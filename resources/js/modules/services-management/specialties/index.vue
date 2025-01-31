<template>
    <v-container>
        <t-breadcrumbs
            :path="router.currentRoute.value.path"
            :title="$t(router.currentRoute.value.meta.breadcrumb)"
            :reset="true"
        >
        </t-breadcrumbs>
    </v-container>
    <v-container>
        <h3> {{ $t('specialties.specialties') }}</h3>
        <v-divider :thickness="2" class="mt-3 mb-4"></v-divider>
        <v-btn
            v-if="userPermissions.includes('specialties/create')"
            :class="'float-' + $t('right') + ' colored-btn'" :to="{ name: 'specialties/create' }">
            <span class="px-2">{{ $t('specialties.add') }}</span>
            <img class="crud-icon" src="@/assets/icons/ic_add_2.svg">
        </v-btn>
        <div class="dt-w-1/2 sm:dt-w-full overflow-hidden">
            <t-data-table
                :rows="tableData"
                :pagination="pagination"
                :query="query"
                :queryType="'LoadData'"
                :loading="isLoading"
                :userPermissions="userPermissions"
                :cols="specialtyCols"
                :actions="specialtyActions"
                @loadData="loadData"
            >
            </t-data-table>
        </div>
    </v-container>
</template>

<script setup>
import useUsers from "../composables/specialties.js";
import TDataTable from "@/shared/components/t-data-table.vue";

import TBreadcrumbs from "@/shared/components/t-breadcrumbs.vue";

const {
    tableData,
    pagination,
    query,
    isLoading,
    loadData,
    deleteItem,
    router,
    userPermissions,
    specialtyCols,
    specialtyActions,
} = useUsers()
</script>
