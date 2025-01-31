import {reactive, ref} from 'vue'
import SpecialtyService from "@/services/specialties-service.js";
import useShared from "@/helpers/shared.js";
import specialtyTableItems from '../models/specialty-table-items';

export default function useSpecialties() {

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
        storeModalItem,
        updateModalItem,
        loadParentData,
        deleteItem,
        cancel,
        loadData,
        saveItem,
        router,
        userPermissions,
        t,
        redirect
    } = useShared()

    service.value = SpecialtyService;
    
    const {
        cols: specialtyCols,
        actions: specialtyActions
    } = specialtyTableItems(t, deleteItem, redirect);

    const form = reactive({
        name_ar: "",
        name_en: "",
        code: "",
        details_en: "",
        details_ar: ""
    });

    const validation = {
        name_ar: [
            validationRules.required,
            validationRules.maxLength(50)
        ],
        name_en: [
            validationRules.required,
            validationRules.maxLength(50)

        ],
        code: [
            validationRules.required,
            validationRules.maxLength(50)
        ],
    }

    
    return {
        itemData,
        tableData,
        pagination,
        query,
        isLoading,
        loadData,
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
        loadParentData,
        storeItem,
        parentDetails,
        updateItem,
        deleteItem,
        saveItem,
        cancel,
        router,
        userPermissions,
        specialtyCols,
        specialtyActions,
        form
    }
}
