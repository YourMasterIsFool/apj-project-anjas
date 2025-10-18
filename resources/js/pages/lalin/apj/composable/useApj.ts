import { Apj, CreateOrUpdateApjDto } from '@/types/apj';
import { IGeneralDataEmbed } from '@/types/generalDataEmbed';
import { useForm, usePage } from '@inertiajs/vue3';
import { computed, ref, watch } from 'vue';

export function useApj() {
    const form = useForm<CreateOrUpdateApjDto>({
        lokasi_nama_jalan: '',
        kode_tiang: '',
        latitude: 0,
        longitude: 0,

        jenis: '',
        tipe_tiang: '',
        tahun_pemasangan: 0,
        lokasi_detail: '',
        keterangan: '',
    });

    const title = ref<string>('Create Apj');

    const page = usePage();

    const jenis = ref<IGeneralDataEmbed[]>([
        {
            name: 'Surya',
            value: 'Surya',
        },
        {
            name: 'Konvensional',
            value: 'Konvensional',
        },
    ]);

    const data = computed(() => page.props.data as Apj | undefined);

    const onSubmit = async () => {
        //
        if (data.value?.id == null) {
            console.log('post');
            form.post('/lalin/apj/');
        } else {
            form.put('/lalin/apj/' + data.value?.id);
        }
    };
    watch(
        () => page.props.data,
        (val) => {
            if (val) {
                const data = val as Apj;
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
        jenis,
    };
}
