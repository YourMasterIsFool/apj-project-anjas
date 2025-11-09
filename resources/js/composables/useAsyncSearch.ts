import { router } from '@inertiajs/vue3';
import { ref, watch } from 'vue';

export function useAsyncSearch<T>(url: string) {
    const params = ref<T>();
    watch(
        params,
        (value) => {
            if (!value) return;
            router.get(url ?? '', value, {
                preserveState: true,
                replace: true,
            });
        },
        { deep: true },
    );

    const setParams = (value: T) => {
        setParams(value);
    };

    return {
        setParams,
        params,
    };
}
