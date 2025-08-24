<template>
    <v-container v-if="!isLoading">
        <t-breadcrumbs
            :path="router.currentRoute.value.path"
            :title="$t(router.currentRoute.value.meta.breadcrumb)"
        >
        </t-breadcrumbs>
    </v-container>
    <v-container v-if="!isLoading">
        <v-row class="p-0 m-0">
            <v-col cols="12" class="font-weight-black">
                {{ $t('categories.edit') }}
            </v-col>
        </v-row>
        <v-divider :thickness="2" class="mt-3 mb-5"></v-divider>
        <v-form v-model="valid" v-on:submit.prevent="saveCategory">
            <v-row class="mt-n2ks">
                <v-col>
                    <v-text-field
                        v-model="itemData.name_ar"
                        :label="$t('name_ar')"
                        variant="solo"
                        :rules="validation.name_ar"
                    >
                    </v-text-field>
                </v-col>
                <v-col>
                    <v-text-field
                        v-model="itemData.name_en"
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
                <span class="px-2">{{ $t('edit') }}</span>
            </v-btn>

        </v-form>

    </v-container>
</template>

<script setup>
import useCategories from "../composables/categories.js";
import {onMounted} from "vue";

import TBreadcrumbs from "@/shared/components/t-breadcrumbs.vue";

const {
    updateItem, validation, form, valid,
    getItem, itemData, isLoading, getPerms,
  router
} = useCategories()
const props = defineProps({
    id: {
        required: true,
        type: String
    }
})

onMounted(() => {
    getPerms(true);
    getItem(props.id, true)
})

const saveCategory = async () => {
    await updateItem(itemData.value, 'categories')
}
</script>
