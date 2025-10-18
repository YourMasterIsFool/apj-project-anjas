<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import CustomTable from '@/components/commons/custom-table/CustomTable.vue';
import MainCard from '@/components/commons/main-card/MainCard.vue';
import { useJalans } from '../composable/useJalans';


const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Jalan',
        href: dashboard().url,
    },
];
const {
    permissionsUrl,
    columns,
    content,
} = useJalans()


</script>

<template>

    <Head title="Jalan" />
    <AppLayout :breadcrumbs="breadcrumbs" title="List Jalan">
        <MainCard :permissionsUrl="permissionsUrl" title="List Jalan">
            <template #main>
                <CustomTable :content="content" :columns="columns" :data="content.data"
                    :permissionsUrl="permissionsUrl" />
            </template>
        </MainCard>
    </AppLayout>
</template>
