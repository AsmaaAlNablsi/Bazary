export default function categoryTableItems(deleteItem, redirect) {

    const cols = [
        { header: 'Name EN', field: 'name_en', cell: (item) => item.name },
        { header: 'Name AR', field: 'name_ar', cell: (item) => item.name_ar }
    ];

    const actions = [
        {
            header: 'details',
            perm: 'categories/details',
            class: 'crud-action-btn',
            icon: "mdi-eye",
            action: (item) => redirect('categories/details', { id: item.id })
        },
        {
            header: 'update',
            perm: 'categories/update',
            icon: "mdi-pencil",
            action: (item) => redirect('categories/update', { id: item.id })
        },
        {
            header: 'delete',
            perm: 'categories/delete',
            icon: "mdi-delete",
            action: (item) => deleteItem(item.id)
        }
    ];

    return {
        cols,
        actions
    }
}
