import { ref } from 'vue';

export function useAsyncSelect() {
    const loading = ref<boolean>(false);

    return [loading];
}
