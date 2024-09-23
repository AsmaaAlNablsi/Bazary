
export default function addressTableItems(t, changeParent, showUpdateModal, deleteItem) {

    const cols = [
        { header: 'Name AR', field: t('name_ar'), cell: (item) => item.name_ar },
        { header: 'Name EN', field: t('name_en'), cell: (item) => item.name_en },
        { header: 'Is Active', field: t('is_active.is_active'), cell: (item) => t('is_active.'  + item.is_active) }
    ];

    const actions = [
        {
            header: 'details',
            perm: 'addresses/details',
            class: 'crud-action-btn',
            icon: "mdi-eye",
            action: (item) => changeParent(item.id)
        },
        {
            header: 'update',
            perm: 'addresses/update',
            icon: "mdi-pencil",
            action: (item) => showUpdateModal(item)
        },
        {
            header: 'delete',
            perm: 'addresses/delete',
            icon: "mdi-delete",
            action: (item) => deleteItem(item.id, true)
        }
    ];

    return {
        cols,
        actions
    }
}