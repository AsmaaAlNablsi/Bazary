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
                {{ $t('specialties.edit') }}
            </v-col>
        </v-row>
        <v-divider :thickness="2" class="mt-3 mb-5"></v-divider>
        <v-form v-model="valid" v-on:submit.prevent="save">

            <v-row class="mt-n2">
                <v-col sm="12" md="6" lg="6">
                    <v-text-field
                        dense
                        v-model="itemData.name_en"
                        :label="$t('specialties.name_en')"
                        variant="solo"
                        :rules="validation.name_en"
                    >
                    </v-text-field>
                </v-col>

                <v-col sm="12" md="6" lg="6">
                    <v-text-field
                        v-model="itemData.name_ar"
                        :label="$t('specialties.name_ar')"
                        variant="solo"
                        :rules="validation.name_ar"
                    >
                    </v-text-field>
                </v-col>

                <v-col sm="12" md="6" lg="6">
                    <v-text-field
                        v-model="itemData.code"
                        :label="$t('specialties.code')"
                        variant="solo"
                        :rules="validation.code"
                    >
                    </v-text-field>
                </v-col>

                <v-col sm="12" md="6" lg="6">
                    <v-textarea
                        clearable
                        v-model="itemData.details_en"
                        :label="$t('specialties.details_en')"
                        variant="solo"
                        :rules="validation.details_en"
                    ></v-textarea>
                </v-col>

                <v-col sm="12" md="6" lg="6">
                    <v-textarea
                        clearable
                        v-model="itemData.details_ar"
                        :label="$t('specialties.details_ar')"
                        variant="solo"
                        :rules="validation.details_ar"
                    ></v-textarea>
                </v-col>

            </v-row>
            
            <router-link :to="{ name: 'specialties'}">
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
import useSpecialties from "../composables/specialties.js";
import {onMounted} from "vue";

import TBreadcrumbs from "@/shared/components/t-breadcrumbs.vue";

const {
    updateItem, validation, valid,
    getItem, itemData, isLoading,
    router
} = useSpecialties()
const props = defineProps({
    id: {
        required: true,
        type: String
    }
})
onMounted(() => {
    
    getItem(props.id, true)
})


const save = async () => {
    await updateItem(itemData.value, 'specialties')
}
</script>
