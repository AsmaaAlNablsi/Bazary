import {useRouter} from 'vue-router';
import {useI18n} from "vue-i18n";
import {inject, ref} from "vue";
import {notify} from "@kyvg/vue3-notification";
import {createConfirmDialog} from "vuejs-confirm-dialog";
import ConfirmDialog from "@/shared/components/confirm-dialog.vue";
import store from "@/store/store.js";
import '../../css/crud.css';
import '../../css/forms.css';
import '../../css/modal.css';

export default function useShared() {
    const {t} = useI18n({})
    const router = useRouter()
    const itemData = ref()
    const tableData = ref([])
    const pagination = ref({})
    const service = ref()
    const detailsService = ref()
    const valid = ref(false);
    const query = ref({
        search: '',
        page: 1,
        per_page: 1000,
    })
    const unAuthenticated = 401;
    const unAuthorized = 403;
    const isLoading = ref(true);
    const updateModal = ref(false);
    const storeModal = ref(false);
    const parentDetails = ref({})
    const parent = ref(null)
    const detailsTableData = ref([])
    const detailsPagination = ref({})
    const detailsQuery = ref({
        search: '',
        page: 1,
        per_page: 1000,
    })
    const detailsIsLoading = ref(true)
    const master = ref(null)
    const currentUser = store.state.auth.user;
    const userPermissions = currentUser? currentUser.permissions : [] ;

    const validationRules = {
        email: value => /.+@.+\..+/.test(value) || t('validation.email'),
        mobile: value => /^09[0-9]{8}$/.test(value) || t('validation.mobile'),
        phone: value => /^0[0-9]{9}$/.test(value) || t('validation.phone'),
        password: value => /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,20}$/.test(value) || t('validation.password'),
        required: value => !!value || t('validation.required')
    }

    const errorHandle = async (error) => {
        console.log('error')
        console.log(error)
        if (error.response.status === unAuthenticated) {
            store.dispatch('auth/logout');
            await router.push({name: 'login'});
        }else if(error.response.status === unAuthorized){
            notify(t('unauthorized'));
        } else
            notify(error.response.data.message);
    }

    const loadData = async (query) => {
        try {
            if (query === undefined)
                query = {
                    search: '',
                    page: 1,
                    per_page: 10,
                }
            const {data: {data, meta}} = await service.value.index({
                parent_id: '',
                page: query.page,
                size: query.per_page,
                search: query.search,
            });
            tableData.value = data
            pagination.value = {...pagination.value, page: query.page, total: meta.total}
            isLoading.value = false
        } catch (error) {
            await errorHandle(error)
        }
    }

    const detailsLoadData = async (detailsQuery) => {
        try {
            if (master.value === null)
                return;
            if (detailsQuery === undefined)
                detailsQuery = {
                    search: '',
                    page: 1,
                    per_page: 10,
                }
            const {data: {data, meta}} = await detailsService.value.detailsIndex(master.value, {
                page: detailsQuery.page,
                size: detailsQuery.per_page,
                search: detailsQuery.search,
            });
            detailsTableData.value = data
            detailsPagination.value = {...detailsPagination.value, page: detailsQuery.page, total: meta.total}
            detailsIsLoading.value = false
        } catch (error) {
            await errorHandle(error)
        }
    }

    const loadParentData = async (query) => {
        try {
            if (query === undefined)
                query = {
                    search: '',
                    page: 1,
                    per_page: 10,
                }


            const {data: {data, meta, parentData}} = await service.value.index({
                parent_id: (parent.value !== null) ? parent.value : '',
                page: query.page,
                size: query.per_page,
                search: query.search,
            });

            tableData.value = data
            if (parentData)
                parentDetails.value = parentData;

            pagination.value = {...pagination.value, page: query.page, total: meta.total}
            isLoading.value = false
        } catch (error) {
            await errorHandle(error)
        }
    }

    const getItem = async (id, showLoader = false) => {
        try {
            const response = await service.value.show(id, showLoader);
            itemData.value = response.data.data;
            isLoading.value = false
        } catch (error) {
            await errorHandle(error)
        }
    }

    function showStoreModal() {
        storeModal.value = true;
    }

    function showUpdateModal(item) {
        updateModal.value = true;
        itemData.value = item;
    }

    const storeItem = async (data, routeName = '', showLoader = false) => {
        if (!valid.value)
            return false;
        try {
            let response = await service.value.store(data, showLoader);
            notify(response.data.message);
            await loadData();
            storeModal.value = false;
            await router.push({ name: routeName });
        } catch (error) {
            await errorHandle(error);
        }
    }
    
    const storeModalItem = async (data, showLoader = false) => {
        try {
            let response = await service.value.store(data, showLoader);
            notify(response.data.message);
            await loadData();
            storeModal.value = false;
        } catch (error) {
            await errorHandle(error);
        }
    }

    const storeModalItemForParent = async (data, showLoader = false) => {
        try {
            data['parent_id'] = parent.value;
            let response = await service.value.store(data, showLoader);
            notify(response.data.message);
            await loadParentData();
            storeModal.value = false;
        } catch (error) {
            await errorHandle(error);
        }
    }

    const saveItem = async (obj) => {
        await storeItem(obj, '', true, true)
    }

    const updateItem = async (item, routeName = '', showLoader = false) => {
        if (!valid.value)
            return false;
        try {
            let response = await service.value.update(item, item.id, showLoader);
            notify(response.data.message);
            await loadData();
            updateModal.value = false;
            await router.push({ name: routeName });
        } catch (error) {
            await errorHandle(error);
        }
    }

    const updateModalItem = async (item, showLoader = false) => {
        try {
            let response = await service.value.update(item, item.id, showLoader);
            notify(response.data.message);
            await loadData();
            updateModal.value = false;
        } catch (error) {
            await errorHandle(error);
        }
    }

    const updateModalItemForParent = async (item, showLoader = false) => {
        try {
            let response = await service.value.update(item, item.id, showLoader);
            notify(response.data.message);
            await loadParentData();
            updateModal.value = false;
        } catch (error) {
            await errorHandle(error);
        }
    }

    const deleteItem = async (id, forParent = false) => {
        const dialog = createConfirmDialog(ConfirmDialog)
        dialog.onConfirm(async () => {
            try {
                let response = await service.value.destroy(id);
                notify(response.data.message);
            } catch (error) {
                await errorHandle(error)
            }
            if (forParent)
                await loadParentData()
            else
                await loadData()
        })
        await dialog.reveal();
    }

    const redirect = (routeName, params) => {
        router.push({ name: routeName, params: params });
    }

    function searchByDropdownList(value) {
        let search = '';
        Object.keys(value).forEach(key => {
            search += key + "=" + value[key] + ';';
        })
        return search;
    }

    return {
        router,
        currentUser,
        userPermissions,
        validationRules,
        tableData,
        pagination,
        valid,
        query,
        isLoading,
        service,
        detailsService,
        itemData,
        updateModal,
        storeModal,
        storeModalItem,
        updateModalItem,
        storeModalItemForParent,
        updateModalItemForParent,
        parent,
        parentDetails,
        master,
        detailsPagination,
        detailsQuery,
        detailsTableData,
        detailsIsLoading,
        saveItem,
        getItem,
        loadData,
        loadParentData,
        deleteItem,
        errorHandle,
        storeItem,
        updateItem,
        showUpdateModal,
        showStoreModal,
        cancel,
        detailsLoadData,
        t,
        redirect
    }
}
