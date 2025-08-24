import {reactive, ref} from 'vue'
import LocationsService from "@/services/locations-service.js";
import useShared from "@/helpers/shared.js";
import locationTableItems from '../models/location-table-items';

export default function useLocations() {

    const {
        validationRules,
        tableData,
        pagination,
        valid,
        query,
        isLoading,
        service,
        innerService,
        itemData,
        getItem,
        parent,
        storeItem,
        updateItem,
        parentDetails,
        updateModal,
        storeModal,
        showStoreModal,
        showUpdateModal,
        storeModalItem,
        updateModalItem,
        loadData,
        loadParentData,
        deleteItem,
        cancel,
        saveItem,
        router,
        userPermissions,
        t,
        redirect
    } = useShared()

    service.value = LocationsService;
    innerService.value = LocationsService;

    const location = ref();


    const {
        cols: locationCols,
        actions: locationActions
    } = locationTableItems(t, redirect, showUpdateModal, deleteItem);

    const form = reactive({
        name: "",
        code: "",
    });

    const validation = {
        name: [
            validationRules.required
        ],
        code: [
            validationRules.required
        ],
    }



    return {
        itemData,
        tableData,
        pagination,
        query,
        location,
        isLoading,
        validation,
        form,
        valid,
        parent,
        updateModal,
        storeModal,
        showStoreModal,
        showUpdateModal,
        storeModalItem,
        updateModalItem,
        getItem,
        loadData,
        service,
        loadParentData,
        storeItem,
        parentDetails,
        updateItem,
        deleteItem,
        saveItem,
        cancel,
        router,
        userPermissions,
        locationCols,
        locationActions,
    }
}
