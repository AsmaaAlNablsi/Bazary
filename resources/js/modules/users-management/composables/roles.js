import {reactive, ref, provide} from 'vue'
import RolesService from "@/services/roles-service.js";
import useShared from "@/helpers/shared.js";
import PermissionsService from "@/services/permissions-service.js";
import roleTableItems from "../models/role-table-items";
import permissionTableItems from "../models/permission-table-items";

export default function useRoles() {

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
        errorHandle,
        userPermissions,
        t,
        redirect
        } = useShared()

    service.value = RolesService;
    provide('service', service);

    const permissions = ref([])

    const {
        cols: roleCols,
        actions: roleActions
    } = roleTableItems(deleteItem, redirect);

    const {
        cols: permissionCols
    } = permissionTableItems();
    
    const form = reactive({
        name: "",
        name_ar: "",
        permissions: []
    });

    const validation = {
        name: [
            validationRules.required,
        ],
        name_ar: [
            validationRules.required,
        ],
        permissions: [
            validationRules.required,
        ]
    }

    const getItem = async (id, showLoader = false) => {
        try {
            const response = await service.value.show(id, showLoader);
            itemData.value = response.data.data['role'];
            itemData.value['permissions'] = response.data.data['permissions'];
            isLoading.value = false
        } catch (error) {
            await errorHandle(error)
        }
    }

    const getPerms = async (showLoader = false) => {
        try {
            const {data: {data}} = await PermissionsService.index({
                parent_id: '',
                page: 1,
                size: 1000000,
                search: '',
            }, showLoader);
            permissions.value = data;
        } catch (error) {
            errorHandle(error)
        }
    }

    const loadParentData = async (query) => {
        try {
            if(parent.value > 0){
                if (query === undefined)
                    query = {
                        search: '',
                        page: 1,
                        per_page: 10,
                    }

                const {data: {data, meta}} = await PermissionsService.index({
                    parent_id: (parent.value !== null) ? parent.value : '',
                    page: query.page,
                    size: query.per_page,
                    search: query.search,
                });

                tableData.value = data
                pagination.value = {...pagination.value, page: query.page, total: meta.total}
                isLoading.value = false
            }

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
        getItem,
        permissions,
        getPerms,
        loadParentData,
        parent,
        storeItem,
        updateItem,
        deleteItem,
        router,
        userPermissions,
        roleCols,
        roleActions,
        permissionCols
    }
}
