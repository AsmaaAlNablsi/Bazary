<template>
    <v-container>
        <t-breadcrumbs
            :path="router.currentRoute.value.path"
            :title="router.currentRoute.value.meta.breadcrumb"
        >
        </t-breadcrumbs>
    </v-container>
    <v-container>
        <v-row class="p-0 m-0">
            <v-col cols="12" class="font-weight-black">
                {{ $t('roles.add') }}
            </v-col>
        </v-row>
        <v-divider :thickness="2" class="mt-3 mb-5"></v-divider>
        <v-form v-model="valid" v-on:submit.prevent="saveRole">
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
                        v-model="form.name"
                        :label="$t('name_en')"
                        variant="solo"
                        :rules="validation.name"
                    >
                    </v-text-field>
                </v-col>
            </v-row>
            <v-row class="mt-n5">
                <v-col>
                    <v-select
                        :label="$t('roles.please_select_permissions')"
                        v-model="form.permissions"
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
                                (+{{ form.permissions.length - 6 }}
                                {{ $t('permissions.permissions_selected') }}
                                )
                            </span>
                        </template>

                    </v-select>
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
                <span class="px-2">{{ $t('save') }}</span>
                <img class="crud-icon" src="@/assets/icons/ic_add_2.svg">
            </v-btn>

        </v-form>

    </v-container>
</template>

<script setup>
import useRoles from "../composables/roles.js";
import {onMounted} from "vue";

import TBreadcrumbs from "@/shared/components/t-breadcrumbs.vue";

const {
    storeItem, validation, form, valid,
    tableData,
    pagination,
    query,
    isLoading,
    getPerms,
    permissions,
    router
} = useRoles()

onMounted(() => {
    getPerms()
});


const saveRole = async () => {
    await storeItem({...form}, 'roles')
}
</script>
