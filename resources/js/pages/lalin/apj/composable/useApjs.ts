import { Apj } from '@/types/apj';
import { PaginationResponse } from '@/types/paginationResponse';
import { PermissionsUrl } from '@/types/permissions';
import { usePage } from '@inertiajs/vue3';
import { ColumnDef, createColumnHelper } from '@tanstack/vue-table';

import { h } from 'vue';
export function useApjs() {
    const page = usePage();
    const URL_PATH = '/lalin/apj';
    const permissionsUrl: PermissionsUrl = {
        createUrl: URL_PATH + '/create',
        updateUrl: URL_PATH + '/update/:id',
        storeUrl: URL_PATH + '/store',
        detailUrl: URL_PATH + '/:id/edit',
        deleteUrl: URL_PATH + '/:id',
        listUrl: URL_PATH,
    };

    const columnHelper = createColumnHelper<Apj>();

    const columns: ColumnDef<Apj, any>[] = [
        columnHelper.display({
            id: 'no',
            header: 'No',
            cell: (info) => info.row.index + 1, // index mulai dari 0, jadi tambahkan 1
        }),

        columnHelper.accessor('lokasi_nama_jalan', {
            header: () => h('div', { class: 'text-left' }, 'Lokasi Nama Jalan'),
            cell: ({ row }) => {
                // Format the amount as a dollar amount

                return h(
                    'div',
                    { class: 'text-left font-medium' },
                    row.getValue('lokasi_nama_jalan'),
                );
            },
        }),

        columnHelper.accessor('kode_tiang', {
            header: () => h('div', { class: 'text-left' }, 'Kode tiang'),
            cell: ({ row }) => {
                // Format the amount as a dollar amount

                return h(
                    'div',
                    { class: 'text-left font-medium' },
                    row.getValue('kode_tiang'),
                );
            },
        }),

        columnHelper.accessor('latitude', {
            header: () => h('div', { class: 'text-left' }, 'Latitude'),
            cell: ({ row }) => {
                // Format the amount as a dollar amount

                return h(
                    'div',
                    { class: 'text-left font-medium' },
                    row.getValue('latitude'),
                );
            },
        }),
        columnHelper.accessor('longitude', {
            header: () => h('div', { class: 'text-left' }, 'Longitude'),
            cell: ({ row }) => {
                // Format the amount as a dollar amount

                return h(
                    'div',
                    { class: 'text-left font-medium' },
                    row.getValue('longitude'),
                );
            },
        }),

        columnHelper.accessor('jenis', {
            header: () => h('div', { class: 'text-left' }, 'Jenis'),
            cell: ({ row }) => {
                // Format the amount as a dollar amount

                return h(
                    'div',
                    { class: 'text-left font-medium' },
                    row.getValue('jenis'),
                );
            },
        }),
        columnHelper.accessor('tahun_pemasangan', {
            header: () => h('div', { class: 'text-left' }, 'Tipe Tiang'),
            cell: ({ row }) => {
                // Format the amount as a dollar amount

                return h(
                    'div',
                    { class: 'text-left font-medium' },
                    row.getValue('tahun_pemasangan'),
                );
            },
        }),
        columnHelper.accessor('lokasi_detail', {
            header: () => h('div', { class: 'text-left' }, 'Tahun Pemasangan'),
            cell: ({ row }) => {
                // Format the amount as a dollar amount

                return h(
                    'div',
                    { class: 'text-left font-medium' },
                    row.getValue('lokasi_detail'),
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

    const content: PaginationResponse<Apj> = pages.props
        .data as PaginationResponse<Apj>;

    console.log(content);
    return {
        page,
        permissionsUrl,
        content,
        columns,
    };
}
