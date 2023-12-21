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
                <data-table
                    :rows="tableData"
                    :pagination="pagination"
                    :query="query"
                    :loading="isLoading"
                    hoverable
                    filter
                    @loadData="loadParentData"
                >
                    <template #thead>
                        <table-head>{{ $t('description_ar') }}</table-head>
                        <table-head>{{ $t('description_en') }}</table-head>
                        <table-head>{{ $t('is_active.is_active') }}</table-head>
                        <table-head>{{ $t('actions') }}</table-head>
                    </template>

                    <template #tbody="{row}">
                        <table-body v-text="row.description_ar"/>
                        <table-body v-text="row.description_en"/>
                        <table-body>
                            <p v-text="$t('is_active.'  + row.is_active)"/>
                        </table-body>
                        <table-body>
                            <div class="crud-actions-container">
                            <v-a
                                v-if="userPermissions.includes('general-codes/update')"
                                @click="showUpdateModal(row)" class="crud-action-btn" >
                                <img alt="edit" src="@/assets/icons/ic_edite.svg">
                            </v-a>
                            <button
                                v-if="userPermissions.includes('general-codes/delete')"
                                @click="deleteItem(row.id, true)" class="crud-action-btn">
                                <img  alt="delete" src="@/assets/icons/ic_delete.svg">
                            </button>
                            </div>
                        </table-body>
                    </template>
                </data-table>
            </div>
        </div>
    </v-container>
</template>

<script setup>
import useGeneralCodes from "../composables/general-codes.js";
import {onMounted, watch} from "vue";
import UpdateGeneral from "@/modules/settings/general-codes/update.vue";
import CreateGeneral from "@/modules/settings/general-codes/create.vue";

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
    userPermissions
} = useGeneralCodes()


onMounted(() => {
    generalCodeParents();
})

watch(parent, () => {
    loadParentData()
});


</script>


