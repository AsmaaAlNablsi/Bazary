
export default function roleTableItems(t, deleteItem, redirect) {

    const cols = [
        { header: 'Name EN', field: 'name_en', cell: (item) => item.name },
        { header: 'Name AR', field: 'name_ar', cell: (item) => item.name_ar }
    ];

    const actions = [
        {
            header: 'details',
            perm: 'roles/details',
            class: 'crud-action-btn',
            icon: "mdi-eye",
            action: (item) => redirect('roles/details', { id: item.id })
        },
        {
            header: 'update',
            perm: 'roles/update',
            icon: "mdi-pencil",
            action: (item) => redirect('roles/update', { id: item.id })
        },
        {
            header: 'delete',
            perm: 'roles/delete',
            icon: "mdi-delete",
            action: (item) => deleteItem(item.id)
        }
    ];

    return {
        cols,
        actions
    }
}