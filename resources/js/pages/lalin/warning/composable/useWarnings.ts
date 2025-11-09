import { PaginationResponse } from '@/types/paginationResponse';
import { PermissionsUrl } from '@/types/permissions';
import { Traffic } from '@/types/traffic';
import { usePage } from '@inertiajs/vue3';
import { ColumnDef, createColumnHelper } from '@tanstack/vue-table';

import { computed, h } from 'vue';
export function useWarnings() {
    const page = usePage();
    const URL_PATH = '/lalin/warning';
    const permissionsUrl: PermissionsUrl = {
        createUrl: URL_PATH + '/create',
        updateUrl: URL_PATH + '/update/:id',
        storeUrl: URL_PATH + '/store',
        detailUrl: URL_PATH + '/:id/edit',
        deleteUrl: URL_PATH + '/:id',
        listUrl: URL_PATH,
        exportUrl: '/export-excel/warning',
    };

    const columnHelper = createColumnHelper<Traffic>();

    const columns: ColumnDef<Traffic, any>[] = [
        columnHelper.display({
            id: 'no',
            header: 'No',
            cell: (info) => info.row.index + 1, // index mulai dari 0, jadi tambahkan 1
        }),

        columnHelper.accessor('jalan', {
            header: () => h('div', { class: 'text-left' }, 'Lokasi'),
            cell: ({ row }) => {
                // Format the amount as a dollar amount
                const original = row.original;
                return h(
                    'div',
                    { class: 'text-left font-medium' },
                    original.jalan?.name,
                );
            },
        }),
        columnHelper.accessor('lokasi', {
            header: () => h('div', { class: 'text-left' }, 'Lokasi'),
            cell: ({ row }) => {
                // Format the amount as a dollar amount

                return h(
                    'div',
                    { class: 'text-left font-medium' },
                    row.getValue('lokasi'),
                );
            },
        }),

        columnHelper.accessor('kode', {
            header: () => h('div', { class: 'text-left' }, 'Kode Traffic'),
            cell: ({ row }) => {
                // Format the amount as a dollar amount

                return h(
                    'div',
                    { class: 'text-left font-medium' },
                    row.getValue('kode'),
                );
            },
        }),

        columnHelper.accessor('jenis_simpang', {
            header: () => h('div', { class: 'text-left' }, 'Jenis Simpang'),
            cell: ({ row }) => {
                // Format the amount as a dollar amount

                return h(
                    'div',
                    { class: 'text-left font-medium' },
                    row.getValue('jenis_simpang'),
                );
            },
        }),
        columnHelper.accessor('tahun_pemasangan', {
            header: () => h('div', { class: 'text-left' }, 'Tahun Pemasangan'),
            cell: ({ row }) => {
                // Format the amount as a dollar amount

                return h(
                    'div',
                    { class: 'text-left font-medium' },
                    row.getValue('tahun_pemasangan'),
                );
            },
        }),
        columnHelper.accessor('pengaturan_fase', {
            header: () => h('div', { class: 'text-left' }, 'Pengaturan Fase'),
            cell: ({ row }) => {
                // Format the amount as a dollar amount

                return h(
                    'div',
                    { class: 'text-left font-medium' },
                    row.getValue('pengaturan_fase'),
                );
            },
        }),
        columnHelper.accessor('tipe_tiang', {
            header: () => h('div', { class: 'text-left' }, 'Tipe Tiang'),
            cell: ({ row }) => {
                // Format the amount as a dollar amount

                return h(
                    'div',
                    { class: 'text-left font-medium' },
                    row.getValue('tipe_tiang'),
                );
            },
        }),

        // columnHelper.accessor('list_lampu', {
        //     header: () => h('div', { class: 'text-left' }, 'Durasi'),
        //     cell: ({ row }) => {
        //         // Format the amount as a dollar amount

        //         return h(
        //             'div',
        //             { class: 'text-left font-medium' },
        //             row.getValue('list_lampu'),
        //         );
        //     },
        // }),

        columnHelper.accessor('kondisi', {
            header: () => h('div', { class: 'text-left' }, 'Kondisi'),
            cell: ({ row }) => {
                // Format the amount as a dollar amount

                return h(
                    'div',
                    { class: 'text-left font-medium' },
                    row.getValue('kondisi'),
                );
            },
        }),

        columnHelper.accessor('keterangan', {
            header: () => h('div', { class: 'text-left' }, 'Keterangan'),
            cell: ({ row }) => {
                // Format the amount as a dollar amount

                return h(
                    'div',
                    { class: 'text-left font-medium' },
                    row.getValue('keterangan'),
                );
            },
        }),
    ];

    const pages = usePage();

    const content = computed(
        () => pages.props.data as PaginationResponse<Traffic>,
    );

    console.log(content);
    return {
        page,
        permissionsUrl,
        content,
        columns,
    };
}
