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
                {{ $t('users.edit') }}
            </v-col>
        </v-row>
        <v-divider :thickness="2" class="mt-3 mb-5"></v-divider>
        <v-form v-model="valid" v-on:submit.prevent="saveUser">
            <v-row class="mt-n2">
                <v-col>
                    <v-text-field
                        v-model="itemData.first_name"
                        :label="$t('users.first_name')"
                        variant="solo"
                        :rules="validation.first_name"
                    >
                    </v-text-field>
                </v-col>
                <v-col>
                    <v-text-field
                        v-model="itemData.last_name"
                        :label="$t('users.last_name')"
                        variant="solo"
                        :rules="validation.last_name"
                    >
                    </v-text-field>
                </v-col>
            </v-row>
            <v-row class="mt-n5">
                <v-col>
                    <v-text-field
                        v-model="itemData.email"
                        :label="$t('users.email')"
                        variant="solo"
                        :rules="validation.email"
                    >
                    </v-text-field>
                </v-col>
                <v-col>
                    <v-text-field
                        v-model="itemData.password"
                        :label="$t('users.password')"
                        variant="solo"
                    >
                    </v-text-field>
                </v-col>
            </v-row>
            <v-row class="mt-n5">
                <v-col>
                    <v-select
                        :label="$t('users.please_select_roles')"
                        v-model="itemData.roles"
                        :items="roles"
                        :item-title="($t('locale.lang') === 'ar') ? 'name_ar' : 'name'"
                        item-value="name"
                        :rules="validation.roles"
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
                                (+{{ itemData.roles.length - 6 }}
                                {{ $t('roles.roles_selected') }}
                                )
                            </span>
                        </template>

                    </v-select>
                </v-col>
            </v-row>
            <router-link :to="{ name: 'users'}">
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
import useUsers from "../composables/users.js";
import {onMounted} from "vue";

import TBreadcrumbs from "@/shared/components/t-breadcrumbs.vue";

const {
    updateItem, validation, form, valid,
    getItem, itemData, isLoading, roles,
    router, getRoles
} = useUsers()
const props = defineProps({
    id: {
        required: true,
        type: String
    }
})
onMounted(() => {
    getRoles();
    getItem(props.id)
})


const saveUser = async () => {
    await updateItem(itemData.value, 'users')
}
</script>
