<template>
    <v-container v-if="!isLoading">
        <t-breadcrumbs
            :path="router.currentRoute.value.path"
            :title="itemData[ 'name_' + $t('locale.lang') ] ?? $t(router.currentRoute.value.meta.breadcrumb)"
        >
        </t-breadcrumbs>
    </v-container>
    <v-container v-if="!isLoading">
        <v-row class="p-0 m-0">
            <v-col cols="12" class="font-weight-black">
                {{ $t('specialties.details') }}
            </v-col>
        </v-row>
        <v-divider :thickness="2" class="mt-3 mb-5"></v-divider>
        <v-row class="mt-n5">
            <v-col>
                <v-label>
                    {{ $t('specialties.name_en') }}
                </v-label>
            </v-col>
            <v-col>
                <b>
                    {{ itemData.name_en }}
                </b>
            </v-col>
        </v-row>

        <v-row class="mt-n3">
            <v-col>
                <v-label>
                    {{ $t('specialties.name_ar') }}
                </v-label>
            </v-col>
            <v-col>
                <b>
                    {{ itemData.name_ar }}
                </b>
            </v-col>
        </v-row>

        <v-row class="mt-n3">
            <v-col>
                <v-label>
                    {{ $t('specialties.code') }}
                </v-label>
            </v-col>
            <v-col>
                <b>
                    {{ itemData.code }}
                </b>
            </v-col>
        </v-row>

        <v-row class="mt-n3">
            <v-col>
                <v-label>
                    {{ $t('specialties.details_en') }}
                </v-label>
            </v-col>
            <v-col>
                <b>
                    {{ itemData.details_en }}
                </b>
            </v-col>
        </v-row>

        <v-row class="mt-n3">
            <v-col>
                <v-label>
                    {{ $t('specialties.details_ar') }}
                </v-label>
            </v-col>
            <v-col>
                <b>
                    {{ itemData.details_ar }}
                </b>
            </v-col>
        </v-row>


        
    </v-container>
</template>

<script setup>
import useUsers from "../composables/specialties.js";
import {onMounted} from "vue";

import TBreadcrumbs from "@/shared/components/t-breadcrumbs.vue";

const {
    getItem, itemData, isLoading,
    parent, router
} = useUsers()
const props = defineProps({
    id: {
        required: true,
        type: String
    }
})

onMounted(async () => {
    parent.value = props.id
    getItem(props.id, true);

})
</script>
