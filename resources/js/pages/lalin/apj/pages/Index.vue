<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import CustomTable from '@/components/commons/custom-table/CustomTable.vue';
import MainCard from '@/components/commons/main-card/MainCard.vue';
import { useApjs } from '../composable/useApjs';


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
} = useApjs()


</script>

<template>

    <Head title="Apj" />
    <AppLayout :breadcrumbs="breadcrumbs" title="List Apj">
        <MainCard :permissionsUrl="permissionsUrl" title="List Apj">
            <template #main>
                <CustomTable :content="content" :columns="columns" :data="content.data"
                    :permissionsUrl="permissionsUrl" />
            </template>
        </MainCard>
    </AppLayout>
</template>
