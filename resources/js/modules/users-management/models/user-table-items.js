
export default function userTableItems(t, deleteItem, redirect) {

    const cols = [
        { header: 'First Name', field: 'users.first_name', cell: (item) => item.first_name },
        { header: 'Last Name', field: 'users.last_name', cell: (item) => item.last_name },
        { header: 'Email', field: 'users.email', cell: (item) => item.email },
        { header: 'Is Active', field: 'users.is_active', cell: (item) => t('is_active.' + item.is_active) }
    ];

    const actions = [
        {
            header: 'details',
            perm: 'users/details',
            class: 'crud-action-btn',
            icon: "mdi-eye",
            action: (item) => redirect('users/details', { id: item.id })
        },
        {
            header: 'update',
            perm: 'users/update',
            icon: "mdi-pencil",
            action: (item) => redirect('users/update', { id: item.id })
        },
        {
            header: 'delete',
            perm: 'users/delete',
            icon: "mdi-delete",
            action: (item) => deleteItem(item.id)
        }
    ];

    return {
        cols,
        actions
    }
}