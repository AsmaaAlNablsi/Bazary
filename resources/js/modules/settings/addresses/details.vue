<template>
    <v-breadcrumbs :items="router.currentRoute.value.meta.breadcrumbs">
    </v-breadcrumbs>
    <v-container  v-if="!isLoading">
        <v-row class="p-0 m-0">
            <v-col cols="12" class="font-weight-black">
                {{ $t('addresses.details') }}
            </v-col>
        </v-row>
        <v-divider :thickness="2" class="mt-2 mb-3"></v-divider>
        <v-row class="mt-n5">
            <v-col>
                <v-text-field
                    v-model="itemData.name_en"
                    :label="$t('name_en')"
                >
                </v-text-field>
            </v-col>
            <v-col>
                <v-text-field
                    v-model="itemData.name_ar"
                    :label="$t('name_ar')"
                >
                </v-text-field>
            </v-col>
        </v-row>
        <v-row class="mt-n5">
            <v-text-field
                :label="$t('is_active.is_active')">
                <p v-text="$t('is_active.'  + itemData.is_active)"/>
            </v-text-field>
        </v-row>

    </v-container>
</template>

<script setup>
import useAddresses from "../composables/addresses.js";
import {onMounted} from "vue";

const { getItem,itemData,isLoading, router} = useAddresses()
const props = defineProps({
    id: {
        required: true,
        type: String
    }
})

onMounted(() => {getItem(props.id)})
</script>


