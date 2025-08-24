<template>
    <v-container>
        <t-breadcrumbs
            :path="router.currentRoute.value.path"
            :title="$t(router.currentRoute.value.meta.breadcrumb)"
        >
        </t-breadcrumbs>
    </v-container>
    <v-container>
        <v-row class="p-0 m-0">
            <v-col cols="12" class="font-weight-black">
                {{ $t('categories.add') }}
            </v-col>
        </v-row>
        <v-divider :thickness="2" class="mt-3 mb-5"></v-divider>
        <v-form v-model="valid" v-on:submit.prevent="saveCategory">
            <v-row class="mt-n2">
                <v-col>
                    <v-text-field
                        v-model="form.name_ar"
                        :label="$t('name_ar')"
                        variant="solo"
                        :rules="validation.name_ar"
                    >
                    </v-text-field>
                </v-col>
                <v-col>
                    <v-text-field
                        v-model="form.name_en"
                        :label="$t('name_en')"
                        variant="solo"
                        :rules="validation.name_en"
                    >
                    </v-text-field>
                </v-col>
            </v-row>

            <router-link :to="{ name: 'categories'}">
                <v-btn :class=" 'float-'+$t('right') " class="colored-btn-cancel">
                    {{ $t('cancel') }}
                </v-btn>
            </router-link>
            <v-btn :class="'float-'+$t('right') + ' colored-btn'"
                   type="submit"
            >
                <span class="px-2">{{ $t('save') }}</span>
                <img class="crud-icon" src="@/assets/icons/ic_add_2.svg">
            </v-btn>

        </v-form>

    </v-container>
</template>

<script setup>
import useCategories from "../composables/categories.js";
import {onMounted} from "vue";

import TBreadcrumbs from "@/shared/components/t-breadcrumbs.vue";

const {
    storeItem, validation, form, valid,
    tableData,
    pagination,
    query,
    isLoading,
    getPerms,
    router
} = useCategories()

onMounted(() => {
    getPerms()
});


const saveCategory = async () => {
    await storeItem({...form}, 'categories', false, false, true, true)
}
</script>
