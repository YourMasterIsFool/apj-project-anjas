export interface PermissionsUrl {
    storeUrl?: string;
    updateUrl?: string;
    createUrl?: string;
    detailUrl?: string;
    deleteUrl?: string;
    editUrl?: string;
    listUrl?: string;
    exportUrl?: string;
}

export interface Permissions {
    canEdit: boolean;
    canDelete: boolean;
    canStore: boolean;
    canUpdate: boolean;
}
