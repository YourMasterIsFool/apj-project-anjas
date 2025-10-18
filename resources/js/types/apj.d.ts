export interface Apj {
    id: number;
    lokasi_nama_jalan: string;
    kode_tiang: string;
    latitude: number;
    longitude: number;
    updated_at: string;
    created_at: string;

    jenis: string;
    tipe_tiang: string;
    tahun_pemasangan: number;
    lokasi_detail: string;
    keterangan: string;
}

export interface CreateOrUpdateApjDto {
    lokasi_nama_jalan: string;
    kode_tiang: string;
    latitude: number;
    longitude: number;
    jenis: string;
    tipe_tiang: string;
    tahun_pemasangan: number;
    lokasi_detail: string;
    keterangan: string;
}
