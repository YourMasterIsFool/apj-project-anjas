import { IDefaultDataEmbed } from '@/types/defaultDataEmbed';

export interface Apj {
    id: number;
    jalan_id: number;
    kode_tiang: string;
    latitude: string;
    longitude: string;
    updated_at: string;
    created_at: string;

    jenis: string;
    tipe_tiang: string;
    tahun_pemasangan: number;
    lokasi_detail: string;
    keterangan: string;
    jalan: IDefaultDataEmbed;
}

export interface CreateOrUpdateApjDto {
    jalan_id: number | null;
    kode_tiang: string;
    latitude: string;
    longitude: string;
    jenis: string;
    tipe_tiang: string;
    tahun_pemasangan: number;
    lokasi_detail: string;
    keterangan: string;
}
