import {reactive, ref} from 'vue';
import AddressesService from "@/services/addresses-service.js";
import useShared from "@/helpers/shared.js";

export default function useAddresses() {

    const {
        validationRules,
        tableData,
        pagination,
        valid,
        query,
        isLoading,
        service,
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
        loadParentData,
        deleteItem,
        cancel,
        saveItem,
        router,
        userPermissions
    } = useShared()

    service.value = AddressesService;
    const address = ref()

    const form = reactive({
        name_ar: "",
        name_en: "",
        code: "",
        is_active:false

    });

    const validation = {
        name_ar: [
            validationRules.required
        ],
        name_en: [
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
        address,
        isLoading,
        validation,
        form,
        valid,
        parent,
        updateModal,
        storeModal,
        showStoreModal,
        showUpdateModal,
        getItem,
        loadParentData,
        storeItem,
        parentDetails,
        updateItem,
        deleteItem,
        saveItem,
        cancel,
        router,
        userPermissions
    }
}
