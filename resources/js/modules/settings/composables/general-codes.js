import {reactive, ref} from 'vue'
import GeneralCodesService from "@/services/general-codes-service.js";
import useShared from "@/helpers/shared.js";

export default function useGeneralCodes() {

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
        storeItem,
        updateItem,
        loadParentData,
        errorHandle,
        updateModal,
        storeModal,
        showStoreModal,
        deleteItem,
        showUpdateModal,
        cancel,
        parent,
        saveItem,
        router,
        userPermissions
    } = useShared()

    service.value = GeneralCodesService;

    const generalCode = ref()
    const items = ref([])

    const form = reactive({
        parent_id: parent.value,
        description_en: "",
        description_ar: "",
        is_active: false
    });

    const validation = {
        parent_id: [
            validationRules.required,
        ],
        level: [
            validationRules.required,
        ],
        description_en: [
            validationRules.required,
        ],
        description_ar: [
            validationRules.required,
        ],
        amount: [
            validationRules.required,
        ],
        is_active: [
            validationRules.required,
        ]
    };

    const generalCodeParents = async (query = {
        page: 1,
        per_page: 1000,
        search: ''
    }) => {
        try {
            const {data: {data}} = await GeneralCodesService.index({
                parent_id: '',
                page: query.page,
                size: query.per_page,
                search: query.search,
            });
            items.value = data
        } catch (error) {
            await errorHandle(error)
        }
    }

    const getCodes = async (code) => {
        try {
            const {data: {data}} = await service.value.codes(code);
            return data;
        } catch (error) {
            errorHandle(error);
            return null;
        }
    }

    return {
        itemData,
        items,
        parent,
        tableData,
        pagination,
        query,
        isLoading,
        form,
        validation,
        valid,
        updateModal,
        storeModal,
        generalCode,
        getItem,
        showStoreModal,
        showUpdateModal,
        cancel,
        updateItem,
        loadParentData,
        generalCodeParents,
        storeItem,
        saveItem,
        deleteItem,
        router,
        userPermissions
    }
}
