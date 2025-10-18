import { Jalan } from '@/types/jalan';
import { useForm, usePage } from '@inertiajs/vue3';
import { computed, ref, watch } from 'vue';

export function useJalan() {
    const form = useForm({
        nama_jalan: '',
        panjang_jalan: 0,
        kode_jalan: '',
        kelas_jalan: '',
    });

    const title = ref<string>('Create Jalan');

    const page = usePage();

    const data = computed(() => page.props.data as Jalan | undefined);

    const onSubmit = async () => {
        //
        if (data.value?.id == null) {
            console.log('post');
            form.post('/lalin/jalan/');
        } else {
            form.put('/lalin/jalan/' + data.value?.id);
        }
    };
    watch(
        () => page.props.data,
        (val) => {
            if (val) {
                const data = val as Jalan;
                form.defaults(val);
                Object.assign(form, data);
            }
        },
        { immediate: true },
    );
    return {
        form,
        onSubmit,
        title,
        data,
    };
}
