import { CreateOrUpdateTrafficDto, Traffic } from '@/types/traffic';
import { useForm, usePage } from '@inertiajs/vue3';
import { computed, ref, watch } from 'vue';

export function useTraffic() {
    const form = useForm<CreateOrUpdateTrafficDto>({
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

    const title = ref<string>('Create Traffic');

    const page = usePage();

    const data = computed(() => page.props.data as Traffic | undefined);

    const onSubmit = async () => {
        //
        if (data.value?.id == null) {
            console.log('post');
            form.post('/lalin/traffic/');
        } else {
            form.put('/lalin/traffic/' + data.value?.id);
        }
    };
    watch(
        () => page.props.data,
        (val) => {
            if (val) {
                const data = val as Traffic;
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
