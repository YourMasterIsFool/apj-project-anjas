export interface Jalan {
    id: number;
    kode_jalan: string;
    nama_jalan: string;
    kelas_jalan: string;
    created_at: string;
    updated_at: string;
    panjang_jalan: number;
}

export interface CreateOrUpdateJalanDto {
    kode_jalan?: string;
    nama_jalan?: string;
    kelas_jalan?: string;
    panjang_jalan: number;
}
