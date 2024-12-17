import {reactive, ref, provide} from 'vue'
import UsersService from "@/services/users-service.js";
import useShared from "@/helpers/shared.js";
import RolesService from "@/services/roles-service.js";
import userTableItems from "../models/user-table-items";
import roleTableItems from "../models/role-table-items";

export default function useUsers() {

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
        parent,
        router,
        errorHandle,
        userPermissions,
        t,
        redirect
    } = useShared()

    service.value = UsersService;
    provide('service', service);
    
    const roles = ref([])

    const {
        cols: userCols,
        actions: userActions
    } = userTableItems(t, deleteItem, redirect);

    const {
        cols: roleCols,
    } = roleTableItems(t, deleteItem, redirect);


    const form = reactive({
        first_name: "",
        last_name: "",
        email: "",
        password: "",
        roles: [],
    });

    const validation = {
        first_name: [
            validationRules.required,
        ],
        last_name: [
            validationRules.required,
        ],
        email: [
            validationRules.required,
            validationRules.email
        ],
        password: [
            validationRules.required
            ,validationRules.password
        ],
        roles: [
            validationRules.required,
        ],
    }

    const getItem = async (id, showLoader = false) => {
        try {
            const response = await service.value.show(id, showLoader);
            itemData.value = response.data.data['user'];
            itemData.value['roles'] = response.data.data['roles'];
            isLoading.value = false
        } catch (error) {
            await errorHandle(error)
        }
    }

    const getRoles = async (showLoader = false) => {
        try {
            const {data: {data}} = await RolesService.index({
                parent_id: '',
                page: 1,
                size: 1000000,
                search: '',
            }, showLoader);
            roles.value = data;
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

                const {data: {data, meta}} = await RolesService.index({
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
        storeItem,
        updateItem,
        deleteItem,
        roles,
        parent,
        router,
        loadParentData,
        getRoles,
        userPermissions,
        userCols,
        userActions,
        roleCols,
   }
}
