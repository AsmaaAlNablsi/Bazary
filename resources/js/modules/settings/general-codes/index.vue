<template>
    <create-general
        :show="storeModal"
        @create="saveItem"
        @cancel="cancel()"
    />
    <update-general
        :show="updateModal"
        :data="itemData"
        @update="updateItem(itemData,'',true, true)"
        @cancel="cancel()"
    />
    <v-breadcrumbs :items="router.currentRoute.value.meta.breadcrumbs">
        <template v-slot:title="{ item }">
            {{ $t(item.title) }}
        </template>
    </v-breadcrumbs>
    <v-container>
        <h3>{{ $t('general_codes.general_codes') }}</h3>
        <v-divider :thickness="2" class="mt-3 mb-4"></v-divider>
        <v-select
            :label="$t('general_codes.please_select_index')"
            :items="items"
            item-value="id"
            :item-title="'description_' +$t('locale.lang')"
            v-model="parent"
            variant="solo"
        ></v-select>

        <div v-if="parent">
            <v-btn
                v-if="userPermissions.includes('general-codes/create')"
                @click="showStoreModal()" :class="'float-'+$t('right') + ' colored-btn'">
                <span class="px-2">{{ $t('general_codes.add') }}</span>
                <img class="crud-icon" src="@/assets/icons/ic_add_2.svg">
            </v-btn>
            <div class="dt-w-1/2 sm:dt-w-full overflow-hidden">
                <t-data-table
                :rows="tableData"
                :pagination="pagination"
                :query="query"
                :loading="isLoading"
                :userPermissions="userPermissions"
                :cols="generalCodesCols"
                :actions="generalCodesActions"
                @loadData="loadData"
                >
                </t-data-table>
            </div>
        </div>
    </v-container>
</template>

<script setup>
import useGeneralCodes from "../composables/general-codes.js";
import {onMounted, watch} from "vue";
import UpdateGeneral from "@/modules/settings/general-codes/update.vue";
import CreateGeneral from "@/modules/settings/general-codes/create.vue";
import TDataTable from "@/shared/components/t-data-table.vue";

const {
    parent,
    items,
    tableData,
    pagination,
    query,
    isLoading,
    updateModal,
    storeModal,
    cancel,
    itemData,
    saveItem,
    showStoreModal,
    showUpdateModal,
    storeItem,
    form,
    updateItem,
    loadParentData,
    generalCodeParents,
    deleteItem,
    router,
    userPermissions,
    generalCodesCols,
    generalCodesActions
} = useGeneralCodes()


onMounted(() => {
    generalCodeParents();
})

watch(parent, () => {
    loadParentData()
});


</script>


