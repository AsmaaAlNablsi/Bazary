<template>
    <create-address
        :show="storeModal"
        @create="saveItem"
        @cancel="cancel()"
    />
    <update-address
        :show="updateModal"
        :data="itemData"
        @update="updateItem(itemData,'',true,true)"
        @cancel="cancel()"
    />

    <v-breadcrumbs :items="router.currentRoute.value.meta.breadcrumbs">
        <template v-slot:title="{ item }">
            {{ $t(item.title) }}
        </template>
        <v-a class="clickable" @click="changeParent(null)">
            {{ $t('addresses.addresses') }}
        </v-a>
        <div class="clickable" v-if="parent">
            <v-row>
                <p class="mx-4">
                    /
                </p>
                <v-a v-if="$t('locale.lang')==='ar'" @click="changeParent(parentDetails.parent_id)">
                    {{ parentDetails.name_ar }}
                </v-a>
                <v-a v-if="$t('locale.lang')==='en'" @click="changeParent(parentDetails.parent_id)">
                    {{ parentDetails.name_en }}
                </v-a>
            </v-row>
        </div>
    </v-breadcrumbs>
    <v-container>
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
                @loadData="loadParentData"
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
    address,
    showStoreModal,
    showUpdateModal,
    storeItem,
    updateItem,
    loadParentData,
    deleteItem,
    saveItem,
    parentDetails,
    router,
    userPermissions,
    changeParent,
    addressCols,
    addressActions
} = useAddresses()



</script>
