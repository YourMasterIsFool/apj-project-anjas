import { IGeneralDataEmbed } from '@/types/generalDataEmbed';

export interface Traffic {
    id: number;
    lokasi?: string | null;
    kode?: string;
    jalan?: IGeneralDataEmbed;
    jenis_simpang?: string;
    tahun_pemasangan: number;
    latitude: number;
    longitude: number;
    pengaturan_fase: number;
    tipe_tiang: string;
    keterangan: string;
    created_at: string;
    updated_at: string;
    kondisi?: string;

    list_lampu?: LampTypeDuration[];
}

export interface CreateOrUpdateTrafficDto {
    lokasi?: string | null;
    kode?: string;
    jalan_id: number | null;
    jenis_simpang?: string;
    tahun_pemasangan: number;
    latitude: string;
    longitude: string;
    pengaturan_fase?: number | null;
    tipe_tiang: string;
    keterangan: string;
    kondisi?: string;
    list_lampu?: LampTypeDuration[];
}

export interface LampTypeDuration {
    durasi: number;
    type: 'merah' | 'hijau' | 'kuning';
}
