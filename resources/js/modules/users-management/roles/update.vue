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
                {{ $t('roles.edit') }}
            </v-col>
        </v-row>
        <v-divider :thickness="2" class="mt-3 mb-5"></v-divider>
        <v-form v-model="valid" v-on:submit.prevent="saveRole">
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
                        v-model="itemData.name"
                        :label="$t('name_en')"
                        variant="solo"
                        :rules="validation.name"
                    >
                    </v-text-field>
                </v-col>
            </v-row>
            <v-row class="mt-n5">
                <v-col>
                    <v-autocomplete
                        :label="$t('roles.please_select_permissions')"
                        v-model="itemData.permissions"
                        :items="permissions"
                        :item-title="'name_ar'"
                        item-value="name"
                        :rules="validation.permissions"
                        variant="solo"
                        multiple
                        clearable
                    >
                        <template v-slot:selection="{ item, index }">
                            <span v-if="index < 6">{{ item.title }} &nbsp;</span>
                            <span
                                v-if="index === 6"
                                class="grey--text caption"
                            >
                                (+{{ itemData.permissions.length - 6 }}
                                {{ $t('permissions.permissions_selected') }}
                                )
                            </span>
                        </template>

                    </v-autocomplete>
                </v-col>
            </v-row>
            <router-link :to="{ name: 'roles'}">
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
import useRoles from "../composables/roles.js";
import {onMounted} from "vue";

import TBreadcrumbs from "@/shared/components/t-breadcrumbs.vue";

const {
    updateItem, validation, form, valid,
    getItem, itemData, isLoading, getPerms,
    permissions, router
} = useRoles()
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

const saveRole = async () => {
    await updateItem(itemData.value, 'roles')
}
</script>
