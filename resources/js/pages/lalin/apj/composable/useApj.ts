import { listJenis } from '@/shared/listJenis';
import { Apj, CreateOrUpdateApjDto } from '@/types/apj';
import { IGeneralDataEmbed } from '@/types/generalDataEmbed';
import { Jalan } from '@/types/jalan';
import { useForm, usePage } from '@inertiajs/vue3';
import { computed, ref, watch } from 'vue';

export function useApj() {
    const form = useForm<CreateOrUpdateApjDto>({
        jalan_id: null,
        kode_tiang: '',
        latitude: '',
        longitude: '',

        jenis: '',
        tipe_tiang: '',
        tahun_pemasangan: 0,
        lokasi_detail: '',
        keterangan: '',
    });

    const title = ref<string>('Create Apj');

    const page = usePage();

    const jenis = listJenis;

    const data = computed(() => page.props.data as Apj | undefined);

    const list_jalan = computed(() => page.props.list_jalan as Jalan[] | []);

    const selectedJalan = ref<IGeneralDataEmbed>();

    const onSubmit = async () => {
        //
        if (data.value?.id == null) {
            form.post('/lalin/apj/', {
                onSuccess: () => {
                    console.log('✅ POST Success');
                },
                onError: (errors) => {
                    console.log('❌ POST Errors:', errors);
                },
                onFinish: () => {
                    console.log('🏁 POST Finished');
                },
                //test
            });
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
        list_jalan,
        selectedJalan,
    };
}
