import { IDashboardResponse } from '@/types/dashboard';
import { usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

export function useDashboard() {
    const pages = usePage();

    const dashboardResponse = computed(
        () => pages.props.data as IDashboardResponse,
    );

    return {
        dashboardResponse,
    };
}
