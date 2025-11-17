import {
    IGenerateForm,
    useFilterGenerateForms,
} from '@/components/commons/generate-filter-form';
import { list_kondisi } from '@/shared/listKondisi';
import { list_lokasi } from '@/shared/listLokasi';
import { list_pengaturan_fase } from '@/shared/listPengaturanFase';
import { IGeneralDataEmbed } from '@/types/generalDataEmbed';
import { Jalan } from '@/types/jalan';
import { PaginationResponse } from '@/types/paginationResponse';
import { PermissionsUrl } from '@/types/permissions';
import { Traffic } from '@/types/traffic';
import { usePage } from '@inertiajs/vue3';
import { ColumnDef, createColumnHelper } from '@tanstack/vue-table';

import { computed, h } from 'vue';
export function useTraffics() {
    const page = usePage();
    const URL_PATH = '/lalin/traffic';
    const permissionsUrl: PermissionsUrl = {
        createUrl: URL_PATH + '/create',
        updateUrl: URL_PATH + '/update/:id',
        storeUrl: URL_PATH + '/store',
        detailUrl: URL_PATH + '/:id/edit',
        deleteUrl: URL_PATH + '/:id',
        listUrl: URL_PATH,
        exportUrl: '/export-excel/traffic',
    };

    const list_jalan = computed(() => page.props.list_jalan as Jalan[] | []);
    const columnHelper = createColumnHelper<Traffic>();

    const columns: ColumnDef<Traffic, any>[] = [
        columnHelper.display({
            id: 'no',
            header: 'No',
            cell: (info) => info.row.index + 1, // index mulai dari 0, jadi tambahkan 1
        }),

        columnHelper.accessor('jalan', {
            header: () => h('div', { class: 'text-left' }, 'Jalan'),
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
            header: () => h('div', { class: 'text-left' }, 'Kode'),
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

    const params: IGenerateForm[] = [
        {
            param_name: 'jalan_id',
            options: list_jalan.value.map(
                (item) =>
                    ({
                        name: item.nama_jalan,
                        value: item.id.toString(),
                    }) as IGeneralDataEmbed,
            ),
            type: 'select',
            label: 'Pilih Jalan',
        },
        {
            param_name: 'pengaturan_fase',
            options: list_pengaturan_fase,
            type: 'select',
            label: 'Pilih Pengaturan Fase',
        },
        {
            param_name: 'kondisi',
            options: list_kondisi,
            type: 'select',
            label: 'Pilih Kondisi',
        },
        {
            param_name: 'Lokasi',
            options: list_lokasi,
            type: 'select',
            label: 'Pilih Lokasi',
        },
    ];

    const filter_forms = useFilterGenerateForms({
        params: params,
        url: permissionsUrl.listUrl ?? '',
    });
    return {
        page,
        permissionsUrl,
        content,
        columns,
        filter_forms,
        list_pengaturan_fase,
    };
}
