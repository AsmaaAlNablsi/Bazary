import {reactive, ref} from 'vue'
import CategoriesService from "@/services/categories-service.js";
import useShared from "@/helpers/shared.js";
import categoryTableItems from "../models/category-table-items";


export default function useCategories() {

    const {
        validationRules,
        tableData,
        pagination,
        valid,
        query,
        isLoading,
        service,
        itemData,
        loadData,
        storeItem,
        updateItem,
        deleteItem,
        router,
        parent,
        t,
        userPermissions,
        redirect
    } = useShared()

    service.value = CategoriesService;

    const permissions = ref([])

    const {
        cols: categoryCols,
        actions: categoryActions
    } = categoryTableItems(deleteItem, redirect);



    const form = reactive({
        name_en: "",
        name_ar: "",
    });

    const validation = {
        name_en: [
            validationRules.required,
        ],
        name_ar: [
            validationRules.required,
        ],
    }

    const getItem = async (id, showLoader = false) => {
        try {
            const response = await service.value.show(id, showLoader);
            itemData.value = response.data.data['categories'];
            isLoading.value = false
        } catch (error) {
            await errorHandle(error)
        }
    }



    return {
        itemData,
        tableData,
        pagination,
        query,
        isLoading,
        form,
        validation,
        valid,
        loadData,
        permissions,
        categoryActions,
        categoryCols,
        parent,
        storeItem,
        updateItem,
        deleteItem,
        router,
        userPermissions,
        t,
    }
}
