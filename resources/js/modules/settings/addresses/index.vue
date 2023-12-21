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
            <data-table :rows="tableData"
                        :pagination="pagination"
                        :query="query"
                        :loading="isLoading"
                        hoverable
                        filter
                        @loadData="loadParentData"
            >
                <template #thead>
                    <table-head> {{ $t('name_ar') }}</table-head>
                    <table-head> {{ $t('name_en') }}</table-head>
                    <table-head>{{ $t('is_active.is_active') }}</table-head>
                    <table-head>{{ $t('actions') }}</table-head>
                </template>

                <template #tbody="{row}">
                    <table-body v-text="row.name_ar"/>
                    <table-body v-text="row.name_en"/>
                    <table-body>
                        <p v-text="$t('is_active.'  + row.is_active)"/>
                    </table-body>

                    <table-body>
                        <div class="crud-actions-container vertical-align">
                            <v-a v-if="row.level < 2" @click="changeParent(row.id)" class="crud-action-btn">
                                <img alt="edit" src="@/assets/icons/ic_view.svg">
                            </v-a>
                            <v-a
                                v-if="userPermissions.includes('addresses/update')"
                                @click="showUpdateModal(row)" class="crud-action-btn">
                                <img alt="edit" src="@/assets/icons/ic_edite.svg">
                            </v-a>
                            <button
                                v-if="userPermissions.includes('addresses/delete')"
                                @click="deleteItem(row.id,true)" class="crud-action-btn">
                                <img alt="delete" src="@/assets/icons/ic_delete.svg">
                            </button>
                        </div>
                    </table-body>
                </template>
            </data-table>
        </div>
    </v-container>
</template>

<script setup>
import useAddresses from "../composables/addresses.js";
import UpdateAddress from "@/modules/settings/addresses/update.vue";
import CreateAddress from "@/modules/settings/addresses/create.vue";

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
    userPermissions
} = useAddresses()

const changeParent = async (id) => {
    parent.value = id;
    await loadParentData()
}

</script>
