<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import CustomTable from '@/components/commons/custom-table/CustomTable.vue';
import MainCard from '@/components/commons/main-card/MainCard.vue';
import { useTraffics } from '../composable/useTraffics';


const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Traffic',
        href: dashboard().url,
    },
];
const {
    permissionsUrl,
    columns,
    content,
} = useTraffics()


</script>

<template>

    <Head title="Traffic" />
    <AppLayout :breadcrumbs="breadcrumbs" title="List Traffic">
        <MainCard :permissionsUrl="permissionsUrl" title="List Traffic">
            <template #main>
                <CustomTable :content="content" :columns="columns" :data="content.data"
                    :permissionsUrl="permissionsUrl" />
            </template>
        </MainCard>
    </AppLayout>
</template>
