<template>
    <t-modal v-model:show="storeModal" :width="'70%'">
        <create-address
            v-model:form="form"
            v-model:valid="valid"
            :validation="validation"
            @create="storeModalItem"
            @cancel="cancel()"
        />
    </t-modal>

    <t-modal v-model:show="updateModal" :width="'70%'">
        <update-address
            v-model:form="itemData"
            v-model:valid="valid"
            :validation="validation"
            @update="updateModalItem"
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
                :loading="isLoading"
                :userPermissions="userPermissions"
                :cols="addressCols"
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
import { onMounted } from "vue";

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
    updateModalItem,
    loadParentData,
    router,
    userPermissions,
    addressCols,
    addressActions,
    valid,
    validation,
    form,
    address,
    getItem,
} = useAddresses()

const props = defineProps({
    id: {
        required: true,
        type: String
    }
})
onMounted(async () => {
    parent.value = props.id;
    if(parent.value)
        await getItem(parent.value, true);
    await loadParentData()
})

</script>
