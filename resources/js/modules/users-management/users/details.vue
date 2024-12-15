<template>
    <v-container v-if="!isLoading">
        <t-breadcrumbs
            :path="router.currentRoute.value.path"
            :title="itemData.first_name ?? router.currentRoute.value.meta.breadcrumb"
        >
        </t-breadcrumbs>
    </v-container>
    <v-container v-if="!isLoading">
        <v-row class="p-0 m-0">
            <v-col cols="12" class="font-weight-black">
                {{ $t('users.details') }}
            </v-col>
        </v-row>
        <v-divider :thickness="2" class="mt-3 mb-5"></v-divider>
        <v-row class="mt-n5">
            <v-col>
                <v-label>
                    {{ $t('users.first_name') }}
                </v-label>
            </v-col>
            <v-col>
                <b>
                    {{ itemData.first_name }}
                </b>
            </v-col>
        </v-row>
        <v-row class="mt-n3">
            <v-col>
                <v-label>
                    {{ $t('users.last_name') }}
                </v-label>
            </v-col>
            <v-col>
                <b>
                    {{ itemData.last_name }}
                </b>
            </v-col>
        </v-row>
        <v-row class="mt-n3">
            <v-col>
                <v-label>
                    {{ $t('users.email') }}
                </v-label>
            </v-col>
            <v-col>
                <b>
                    {{ itemData.email }}
                </b>
            </v-col>
        </v-row>
        <v-row class="p-0 mt-5">
            <v-col cols="12" class="font-weight-bold">
                {{ $t('roles.roles') }}
            </v-col>
        </v-row>
        <v-divider :thickness="2" class="mt-3 mb-5"></v-divider>
        <div v-if="parent && userPermissions.includes('roles')" class="dt-w-1/2 sm:dt-w-full overflow-hidden">
            <t-data-table
                :rows="tableData"
                :pagination="pagination"
                :query="query"
                :loading="isLoading"
                :userPermissions="userPermissions"
                :cols="roleCols"
                @loadData="loadParentData"
            >
            </t-data-table>
        </div>

    </v-container>
</template>

<script setup>
import useUsers from "../composables/users.js";
import {onMounted} from "vue";
import TDataTable from "@/shared/components/t-data-table.vue";

import TBreadcrumbs from "@/shared/components/t-breadcrumbs.vue";

const {
    getItem, itemData, isLoading, permissions,
    loadParentData, tableData, query, pagination,
    parent, router, userPermissions, roleCols
} = useUsers()
const props = defineProps({
    id: {
        required: true,
        type: String
    }
})

onMounted(async () => {
    parent.value = props.id
    getItem(props.id);

})
</script>
