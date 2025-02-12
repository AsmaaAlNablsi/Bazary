<template>
    <v-container v-if="!isLoading">
        <t-breadcrumbs
            :path="router.currentRoute.value.path"
            :title="itemData.name ?? $t(router.currentRoute.value.meta.breadcrumb)"
        >
        </t-breadcrumbs>
    </v-container>
    <v-container v-if="!isLoading">
        <v-row class="p-0 m-0">
            <v-col cols="12" class="font-weight-black">
                {{ $t('roles.details') }}
            </v-col>
        </v-row>
        <v-divider :thickness="2" class="mt-3 mb-5"></v-divider>
        <v-row class="nt-n2">
            <v-col>
                <v-label>
                    {{ $t('name_ar')}}
                </v-label>
            </v-col>
            <v-col>
                <p>
                    {{ itemData.name_ar }}
                </p>
            </v-col>
        </v-row>
        <v-row class="nt-n5">
            <v-col>
                <v-label>
                    {{ $t('name_en')}}
                </v-label>
            </v-col>
            <v-col>
                <p>
                    {{ itemData.name }}
                </p>
            </v-col>
        </v-row>
        <v-row class="nt-n5">
            <v-row class="p-0 m-0">
                <v-col cols="12" class="font-weight-bold">
                    {{ $t('permissions.permissions') }}
                </v-col>
            </v-row>
            <v-divider :thickness="2" class="mt-4 mb-5"></v-divider>
            <div v-if="parent && userPermissions.includes('permissions')" class="dt-w-1/2 sm:dt-w-full overflow-hidden">
                <t-data-table
                :rows="tableData"
                :pagination="pagination"
                :query="query"
                :queryType="'LoadParentData'"
                :loading="isLoading"
                :userPermissions="userPermissions"
                :cols="permissionCols"
                @loadData="loadParentData"
                >
                </t-data-table>
            </div>

        </v-row>
    </v-container>
</template>

<script setup>
import useRoles from "../composables/roles.js";
import {onMounted} from "vue";
import TDataTable from "@/shared/components/t-data-table.vue";

import TBreadcrumbs from "@/shared/components/t-breadcrumbs.vue";

const {
    getItem, itemData, isLoading, permissions,
    loadParentData, tableData, query, pagination, parent,router,
    userPermissions, permissionCols
} = useRoles()
const props = defineProps({
    id: {
        required: true,
        type: String
    }
})

onMounted(() => {
    parent.value = props.id
    getItem(props.id, true);
})

</script>
