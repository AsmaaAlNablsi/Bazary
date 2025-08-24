
export default function locationTableItems(t, redirect, showUpdateModal, deleteItem,getAutoLocationLabel,getAutoProtocolLabel) {

    const cols = [
        { header: 'Name', field: 'name', cell: (item) => item.name },
        { header: 'Code', field: 'code', cell: (item) => item.code },
    ];

    const actions = [
        {
            header: 'details',
            perm: 'locations/details',
            class: 'crud-action-btn',
            icon: "mdi-eye",
            action: (item) => redirect('locations', { id: item.id })
        },
        {
            header: 'update',
            perm: 'locations/update',
            icon: "mdi-pencil",
            action: (item) => showUpdateModal(item)
        },
        {
            header: 'delete',
            perm: 'locations/delete',
            icon: "mdi-delete",
            action: (item) => deleteItem(item.id, true)
        }
    ];

    return {
        cols,
        actions
    }
}
