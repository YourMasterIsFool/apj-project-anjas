import { list_kondisi } from '@/shared/listKondisi';
import { list_lokasi } from '@/shared/listLokasi';
import { IGeneralDataEmbed } from '@/types/generalDataEmbed';
import { Jalan } from '@/types/jalan';
import {
    CreateOrUpdateTrafficDto,
    LampTypeDuration,
    Traffic,
} from '@/types/traffic';
import { useForm, usePage } from '@inertiajs/vue3';
import { computed, ref, watch } from 'vue';

export function useWarning() {
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

    const list_pengaturan_fase = ref<IGeneralDataEmbed[]>([
        {
            name: '1',
            value: '1',
        },
        {
            name: '2',
            value: '2',
        },
        {
            name: '3',
            value: '3',
        },
        {
            name: '4',
            value: '4',
        },
        {
            name: '5',
            value: '5',
        },
    ]);

    const title = ref<string>('Create Traffic');

    const onSubmit = async () => {
        //
        if (data.value?.id == null) {
            form.post('/lalin/warning');
        } else {
            form.put('/lalin/warning/' + data.value?.id);
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
    };
}
