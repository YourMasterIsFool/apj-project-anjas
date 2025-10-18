export interface Traffic {
    id: number;
    lokasi?: string;
    kode?: string;
    jenis_simpang?: string;
    tahun_pemasangan: number;
    latitude: number;
    longitude: number;
    pengaturan_fase: string;
    tipe_tiang: string;
    durasi: string;
    kondisi: string;
    keterangan: string;
    created_at: string;
    updated_at: string;
}

export interface CreateOrUpdateTrafficDto {
    lokasi?: string;
    kode?: string;
    jenis_simpang?: string;
    tahun_pemasangan: number;
    latitude: number;
    longitude: number;
    pengaturan_fase: string;
    tipe_tiang: string;
    durasi: string;
    kondisi: string;
    keterangan: string;
}
