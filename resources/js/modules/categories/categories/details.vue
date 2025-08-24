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
                {{ $t('categories.details') }}
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
                    {{ itemData.name_en }}
                </p>
            </v-col>
        </v-row>

    </v-container>
</template>

<script setup>
import useCategories from "../composables/categories.js";
import {onMounted} from "vue";

import TBreadcrumbs from "@/shared/components/t-breadcrumbs.vue";

const {
    getItem, itemData, isLoading, permissions,
    loadParentData, tableData, query, pagination, parent,router,
} = useCategories()
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
