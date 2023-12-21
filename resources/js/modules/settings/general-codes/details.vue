<template>
    <v-breadcrumbs :items="router.currentRoute.value.meta.breadcrumbs">
    </v-breadcrumbs>
    <v-container  v-if="!isLoading">
        <v-row class="p-0 m-0">
            <v-col cols="12" class="font-weight-black">
                {{ $t('general_codes.details') }}
            </v-col>
        </v-row>
        <v-divider :thickness="2" class="mt-1 mb-2"></v-divider>
        <v-row class="mt-n5">
            <v-col>
                <v-text-field
                    v-model="generalCodeData.parent_id"
                    :label="$t('general_codes.parent_id')"
                >
                </v-text-field>
            </v-col>
            <v-col>
                <v-text-field
                    v-model="generalCodeData.level"
                    :label="$t('general_codes.level')"
                >
                </v-text-field>
            </v-col>
        </v-row>
        <v-row class="mt-n5">
            <v-col>
                <v-text-field
                    v-model="generalCodeData.description_ar"
                    :label="$t('description_ar')"
                >
                </v-text-field>

            </v-col>
            <v-col>
                <v-text-field
                    v-model="generalCodeData.description_en"
                    :label="$t('description_en')"
                >
                </v-text-field>
            </v-col>
        </v-row>
        <v-row class="mt-n5">
            <v-text-field
                :label="$t('is_active.is_active')">
                <p v-text="$t('is_active.'  + generalCodeData.is_active)"/>
            </v-text-field>
        </v-row>

    </v-container>
</template>

<script setup>
import useGeneralCodes from "../composables/general-codes.js";
import {onMounted} from "vue";

const { generalCodeData,getGeneralCode,isLoading,router} = useGeneralCodes()
const props = defineProps({
    id: {
        required: true,
        type: String
    }
})

onMounted(() => { getGeneralCode(props.id)})
</script>

