
export default function specialtyTableItems(t, deleteItem, redirect) {

    const cols = [
        { header: 'English Name', field: 'specialties.name_en', cell: (item) => item.name_en },
        { header: 'Arabic Name', field: 'specialties.name_ar', cell: (item) => item.name_ar },
    ];

    const actions = [
        {
            header: 'details',
            perm: 'specialties/details',
            class: 'crud-action-btn',
            icon: "mdi-eye",
            action: (item) => redirect('specialties/details', { id: item.id })
        },
        {
            header: 'update',
            perm: 'specialties/update',
            icon: "mdi-pencil",
            action: (item) => redirect('specialties/update', { id: item.id })
        },
        {
            header: 'delete',
            perm: 'specialties/delete',
            icon: "mdi-delete",
            action: (item) => deleteItem(item.id)
        }
    ];

    return {
        cols,
        actions
    }
}