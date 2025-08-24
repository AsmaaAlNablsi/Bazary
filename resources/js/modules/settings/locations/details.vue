<template>
    <v-breadcrumbs :items="router.currentRoute.value.meta.breadcrumbs">
    </v-breadcrumbs>
    <v-container  v-if="!isLoading">
        <v-row class="p-0 m-0">
            <v-col cols="12" class="font-weight-black">
                {{ $t('locations.details') }}
            </v-col>
        </v-row>
        <v-divider :thickness="2" class="mt-2 mb-3"></v-divider>
        <v-row class="mt-n5">
            <v-col>
                <v-text-field
                    v-model="itemData.name"
                    :label="$t('name')"
                >
                </v-text-field>
            </v-col>
            <v-col>
                <v-text-field
                    v-model="itemData.code"
                    :label="$t('locations.code')"
                >
                </v-text-field>
            </v-col>
        </v-row>
    </v-container>
</template>

<script setup>
import useLocations from "../composables/locations.js";
import {onMounted} from "vue";

const { getItem,itemData,isLoading, router} = useLocations()
const props = defineProps({
    id: {
        required: true,
        type: String
    }
})

onMounted(() => {getItem(props.id)})
</script>


