
export default function contentTableItems(t, redirect, showUpdateModal) {

    const cols = [
        { header: 'Name', field: 'name', cell: (item) => item.name },
        { header: 'Type', field: 'settings.type', cell: (item) => item.type },
    ];

    const actions = [
        {
            header: 'details',
            perm: 'settings/details',
            class: 'crud-action-btn',
            icon: "mdi-eye",
            action: (item) => redirect('settings/details', { id: item.id })
        },
        {
            header: 'update',
            perm: 'settings/update',
            icon: "mdi-pencil",
            action: (item) => redirect('settings/update-content', { id: item.id })
        },
    ];

    return {
        cols,
        actions
    }
}
