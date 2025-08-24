<template>
    <t-modal v-model:show="updateModal" :width="'70%'">
        <update-location
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
            :title="itemData?.name ?? $t(router.currentRoute.value.meta.breadcrumb)"
            :reset="parent ? false : true"
        >
        </t-breadcrumbs>
    </v-container>
    <v-container v-if="!isLoading">
        <h3>{{ $t('locations.locations') }}</h3>
        <v-divider :thickness="2" class="mt-3 mb-5"></v-divider>
        <div class="dt-w-1/2 sm:dt-w-full overflow-hidden">
            <t-data-table
                :rows="tableData"
                :pagination="pagination"
                :query="query"
                :queryType="queryType"
                :loading="isLoading"
                :userPermissions="userPermissions"
                :cols="locationCols"
                :actions="locationActions"
                @loadData="loadParentData"
            >
            </t-data-table>
        </div>
    </v-container>
</template>

<script setup>
import useLocations from "../composables/locations.js";
import UpdateLocation from "@/modules/settings/locations/update.vue";
import TDataTable from "@/shared/components/t-data-table.vue";
import TBreadcrumbs from "@/shared/components/t-breadcrumbs.vue";
import TModal from "@/shared/components/t-modal.vue";
import { defineProps, onMounted, ref } from "vue";
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
    updateModalItem,
    loadParentData,
    loadData,
    router,
    userPermissions,
    locationCols,
    locationActions,
    valid,
    validation,
    form,
    service,
    location,
    getItem,
    getAutoLocations,
    getAutoProtocols,
} = useLocations()

const props = defineProps({
    id: {
        required: true,
        type: String
    }
})
const queryType = ref(null);


onMounted(async () => {
    parent.value = props.id;
    if(parent.value)
        await getItem(parent.value, true);
    await loadParentData()
    await  getAutoLocations();
    await  getAutoProtocols();
})

</script>
