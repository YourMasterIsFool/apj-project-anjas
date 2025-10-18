import { CreateOrUpdateWarningDto, Warning } from '@/types/warning';
import { useForm, usePage } from '@inertiajs/vue3';
import { computed, ref, watch } from 'vue';

export function useWarning() {
    const form = useForm<CreateOrUpdateWarningDto>({
        lokasi: '',
        kode: '',
        jenis_simpang: '',
        tahun_pemasangan: 0,
        latitude: 0,
        longitude: 0,
        pengaturan_fase: '',
        tipe_tiang: '',
        durasi: '',
        kondisi: '',
        keterangan: '',
    });

    const title = ref<string>('Create Warning');

    const page = usePage();

    const data = computed(() => page.props.data as Warning | undefined);

    const onSubmit = async () => {
        //
        if (data.value?.id == null) {
            console.log('post');
            form.post('/lalin/warning/');
        } else {
            form.put('/lalin/warning/' + data.value?.id);
        }
    };
    watch(
        () => page.props.data,
        (val) => {
            if (val) {
                const data = val as Warning;
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
