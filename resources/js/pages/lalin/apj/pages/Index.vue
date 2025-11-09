<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import CustomTable from '@/components/commons/custom-table/CustomTable.vue';
import MainCard from '@/components/commons/main-card/MainCard.vue';
import { useApjs } from '../composable/useApjs';
import { useAsyncSearch } from '@/composables/useAsyncSearch';
import { IGeneralDataEmbed } from '@/types/generalDataEmbed';
import AsyncSelect from '@/components/commons/async-select/AsyncSelect.vue';



const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Apj',
        href: dashboard().url,
    },
];
const {
    permissionsUrl,
    columns,
    content,
    list_jalan
} = useApjs()

const {
    params
} = useAsyncSearch<{
    jalan_id: number
}>(permissionsUrl.listUrl ?? "");
</script>

<template>

    <Head title="Apj" />
    <AppLayout :breadcrumbs="breadcrumbs" title="List Apj">
        <MainCard :permissionsUrl="permissionsUrl" title="List Apj">
            <template #main>
                <CustomTable :content="content" :columns="columns" :data="content.data"
                    :permissionsUrl="permissionsUrl">
                    <template #filter>
                        <AsyncSelect label="Jalan" :value="params?.jalan_id"
                            @update:model-value="(value: IGeneralDataEmbed) => params.jalan_id = Number(value?.value)"
                            :options="list_jalan.map((item) => ({
                                value: item.id.toString(),
                                name: item.nama_jalan
                            }))" />
                    </template>
                </CustomTable>
            </template>
        </MainCard>
    </AppLayout>
</template>
