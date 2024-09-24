
export default function roleTableItems(t, showUpdateModal, deleteItem) {

    const cols = [
        { header: 'Description AR', field: t('description_ar'), cell: (item) => item.description_ar },
        { header: 'Description EN', field: t('description_en'), cell: (item) => item.description_en },
        { header: 'Is Active', field: t('users.is_active'), cell: (item) => t('is_active.' + item.is_active) }
    ];
    
    const actions = [
        {
            header: 'update',
            perm: 'roles/update',
            icon: "mdi-pencil",
            action: (item) => showUpdateModal(item)
        },
        {
            header: 'delete',
            perm: 'roles/delete',
            icon: "mdi-delete",
            action: (item) => deleteItem(item.id, true)
        }
    ];

    return {
        cols,
        actions
    }
}