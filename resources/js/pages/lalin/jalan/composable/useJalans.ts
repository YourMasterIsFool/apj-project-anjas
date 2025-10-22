import { Jalan } from '@/types/jalan';
import { PaginationResponse } from '@/types/paginationResponse';
import { PermissionsUrl } from '@/types/permissions';
import { usePage } from '@inertiajs/vue3';
import { ColumnDef, createColumnHelper } from '@tanstack/vue-table';

import { computed, h } from 'vue';
export function useJalans() {
    const page = usePage();
    const URL_PATH = '/lalin/jalan';
    const permissionsUrl: PermissionsUrl = {
        createUrl: URL_PATH + '/create',
        updateUrl: URL_PATH + '/update/:id',
        storeUrl: URL_PATH + '/store',
        detailUrl: URL_PATH + '/:id/edit',
        deleteUrl: URL_PATH + '/:id',
        listUrl: URL_PATH,
        exportUrl: '/export-excel/jalan',
    };

    const columnHelper = createColumnHelper<Jalan>();

    const columns: ColumnDef<Jalan, any>[] = [
        columnHelper.display({
            id: 'no',
            header: 'No',
            cell: (info) => info.row.index + 1, // index mulai dari 0, jadi tambahkan 1
        }),

        columnHelper.accessor('nama_jalan', {
            header: () => h('div', { class: 'text-left' }, 'Nama Jalan'),
            cell: ({ row }) => {
                // Format the amount as a dollar amount

                return h(
                    'div',
                    { class: 'text-left font-medium' },
                    row.getValue('nama_jalan'),
                );
            },
        }),

        columnHelper.accessor('kode_jalan', {
            header: () => h('div', { class: 'text-left' }, 'Kode Jalan'),
            cell: ({ row }) => {
                // Format the amount as a dollar amount

                return h(
                    'div',
                    { class: 'text-left font-medium' },
                    row.getValue('kode_jalan'),
                );
            },
        }),

        columnHelper.accessor('panjang_jalan', {
            header: () => h('div', { class: 'text-left' }, 'Panjang Jalan'),
            cell: ({ row }) => {
                // Format the amount as a dollar amount

                return h(
                    'div',
                    { class: 'text-left font-medium' },
                    row.getValue('panjang_jalan'),
                );
            },
        }),
        columnHelper.accessor('kelas_jalan', {
            header: () => h('div', { class: 'text-left' }, 'Kelas Jalan'),
            cell: ({ row }) => {
                // Format the amount as a dollar amount

                return h(
                    'div',
                    { class: 'text-left font-medium' },
                    row.getValue('kelas_jalan'),
                );
            },
        }),
    ];

    const pages = usePage();

    const content = computed(
        () => pages.props.data as PaginationResponse<Jalan>,
    );
    return {
        page,
        permissionsUrl,
        content,
        columns,
    };
}
