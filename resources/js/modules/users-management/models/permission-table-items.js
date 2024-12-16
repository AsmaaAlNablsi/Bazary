
export default function permissionTableItems() {

    const cols = [
        { header: 'Name EN', field: 'name_en', cell: (item) => item.name },
        { header: 'Name AR', field: 'name_ar', cell: (item) => item.name_ar }
    ];

    return {
        cols
    }
}