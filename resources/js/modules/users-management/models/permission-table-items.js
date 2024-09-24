
export default function permissionTableItems(t) {

    const cols = [
        { header: 'Name EN', field: t('name_en'), cell: (item) => item.name },
        { header: 'Name AR', field: t('name_ar'), cell: (item) => item.name_ar }
    ];

    return {
        cols
    }
}