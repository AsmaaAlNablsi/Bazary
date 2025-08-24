<template>
    <v-container>
        <t-breadcrumbs
            :path="router.currentRoute.value.path"
            :title="$t(router.currentRoute.value.meta.breadcrumb)"
            :reset="true"
        >
        </t-breadcrumbs>
    </v-container>
    <v-container class="container">
        <h3> {{ $t('categories.categories') }}</h3>
        <v-divider :thickness="2" class="mt-3 mb-4"></v-divider>
        <v-btn
            v-if="userPermissions.includes('categories/create')"
            :class="'float-'+$t('right') + ' colored-btn'" :to="{ name: 'categories/create' }">
            <span class="px-2">{{ $t('categories.add') }}</span>
            <img class="crud-icon" src="@/assets/icons/ic_add_2.svg">
        </v-btn>
        <div class="dt-w-1/2 sm:dt-w-full overflow-hidden">
            <t-data-table
                :rows="tableData"
                :pagination="pagination"
                :query="query"
                :loading="isLoading"
                :userPermissions="userPermissions"
                :cols="categoryCols"
                :actions="categoryActions"
                @loadData="loadData"
                :queryType="'LoadData'"
            >
            </t-data-table>
        </div>
    </v-container>
</template>

<script setup>
import useCategories from "../composables/categories.js";
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
    categoryCols,
    categoryActions,
    userPermissions
} = useCategories()
</script>

