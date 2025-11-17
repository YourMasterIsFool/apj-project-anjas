<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import DashboardCard from '../components/DashboardCard.vue';
import { useDashboard } from '../composable/useDashboard';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: "",
    },
];
const {
    dashboardResponse
} = useDashboard()
</script>

<template>

    <Head title="Dashboard" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4">

            <div class="grid grid-cols-1 md:gap-6 gap-3 md:grid-cols-4 ">
                <DashboardCard title="Total Apj" :value="dashboardResponse.total_apj.toString()" />
                <DashboardCard title="Total Traffic" :value="dashboardResponse.total_traffic.toString()" />
                <DashboardCard title="Total Warning" :value="dashboardResponse.total_warning.toString()" />
                <DashboardCard title="Total Jalan" :value="dashboardResponse.total_jalan.toString()" />

            </div>

        </div>
    </AppLayout>
</template>
