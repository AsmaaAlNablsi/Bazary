<template>
    <t-modal v-model:show="storeModal" :width="'70%'">
        <create-address
            v-model:form="form"
            v-model:valid="valid"
            :validation="validation"
            @create="parent.value ? storeModalItemForParent() : storeModalItem()"
            @cancel="cancel()"
        />
    </t-modal>

    <t-modal v-model:show="updateModal" :width="'70%'">
        <update-address
            v-model:form="itemData"
            v-model:valid="valid"
            :validation="validation"
            @update="parent.value ? updateModalItemForParent() : updateModalItem()"
            @cancel="cancel()"
        />
    </t-modal>
    
    <v-container v-if="!isLoading">
        <t-breadcrumbs
            :path="router.currentRoute.value.path"
            :title="itemData?.name_ar ?? $t(router.currentRoute.value.meta.breadcrumb)"
            :reset="parent ? false : true"
        >
        </t-breadcrumbs>
    </v-container>
    <v-container v-if="!isLoading">
        <h3>{{ $t('addresses.addresses') }}</h3>
        <v-divider :thickness="2" class="mt-3 mb-5"></v-divider>
        <v-btn
            v-if="parent && userPermissions.includes('addresses/create')"
            @click="showStoreModal()" :class="'float-'+$t('right') + ' colored-btn'" >
            <span class="px-2">{{ $t('addresses.add') }}</span>
            <img class="crud-icon" src="@/assets/icons/ic_add_2.svg">
        </v-btn>
        <div class="dt-w-1/2 sm:dt-w-full overflow-hidden">
            <t-data-table
                :rows="tableData"
                :pagination="pagination"
                :query="query"
                :queryType="parent ? 'LoadParentData' : 'LoadData'"
                :loading="isLoading"
                :userPermissions="userPermissions"
                :cols="addressCols"
                @loadData="loadAddresses"
                :actions="addressActions"
            >
            </t-data-table>
        </div>
    </v-container>
</template>

<script setup>
import useAddresses from "../composables/addresses.js";
import UpdateAddress from "@/modules/settings/addresses/update.vue";
import CreateAddress from "@/modules/settings/addresses/create.vue";
import TDataTable from "@/shared/components/t-data-table.vue";
import TBreadcrumbs from "@/shared/components/t-breadcrumbs.vue";
import TModal from "@/shared/components/t-modal.vue"; 
import { defineProps, inject, onMounted } from "vue";
import cookie from "vue-cookies";

const {
    parent,
    tableData,
    pagination,
    query,
    isLoading,
    updateModal,
    storeModal,
    cancel,
    itemData,
    showStoreModal,
    storeModalItem,
    storeModalItemForParent,
    updateModalItem,
    updateModalItemForParent,
    loadParentData,
    loadData,
    router,
    userPermissions,
    addressCols,
    addressActions,
    valid,
    validation,
    form,
    service,
    address,
    getItem,
} = useAddresses()

const props = defineProps({
    id: {
        required: true,
        type: String
    }
})

const loadAddresses = async (query) => {
    loadParentData(query)
}

onMounted(async () => {
    parent.value = props.id;
    let queryType = parent.value ? 'LoadParentData' : 'LoadData';
    if(parent.value)
        await getItem(parent.value, true);
    else if(cookie.get(`${service.value.routPath + queryType}`).query.page == 1){
        pagination.value = cookie.get(`${service.value.routPath + queryType}`)?.pagination ?? pagination.value;
        query.value = cookie.get(`${service.value.routPath + queryType}`)?.query ?? query.value;
    await loadAddresses(query.value)
}


})

</script>
