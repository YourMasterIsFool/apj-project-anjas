import { list_kondisi } from '@/shared/listKondisi';
import { list_lokasi } from '@/shared/listLokasi';
import { list_pengaturan_fase } from '@/shared/listPengaturanFase';
import { Jalan } from '@/types/jalan';
import {
    CreateOrUpdateTrafficDto,
    LampTypeDuration,
    Traffic,
} from '@/types/traffic';
import { useForm, usePage } from '@inertiajs/vue3';
import { computed, ref, watch } from 'vue';

export function useTraffic() {
    const page = usePage();
    const list_lampu = computed(() => page.props.lamp_types as string[]) ?? [];
    const data = computed(() => page.props.data as Traffic | undefined);
    const list_jalan = computed(() => page.props.list_jalan as Jalan[] | []);

    const form = useForm<CreateOrUpdateTrafficDto>({
        lokasi: '',
        kode: '',
        jalan_id: null,
        jenis_simpang: '',
        tahun_pemasangan: 0,
        latitude: '',
        longitude: '',
        pengaturan_fase: null,
        tipe_tiang: '',
        keterangan: '',
        list_lampu: [
            ...list_lampu.value.map(
                (item) =>
                    ({
                        type: item,
                        durasi: 0,
                    }) as LampTypeDuration,
            ),
        ],
    });

    const title = ref<string>('Create Traffic');

    const onSubmit = async () => {
        //
        if (data.value?.id == null) {
            console.log('post');
            form.post('/lalin/traffic');
        } else {
            form.put('/lalin/traffic/' + data.value?.id);
        }
    };

    console.log(data);
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
        list_lampu,
        list_pengaturan_fase,
        list_kondisi,
        list_jalan,
        list_lokasi,
        // filter_forms,
    };
}
