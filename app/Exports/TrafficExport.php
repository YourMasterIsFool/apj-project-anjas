<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Modules\Lalin\Models\TTraffic as ModelsTTraffic;

class TrafficExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */

    private $models;
    public function __construct($model)
    {
        $this->models = $model;
    }
    public function collection()
    {
        return $this->models;
    }

    public function headings(): array
    {

        // $table->string('kode_jalan');
        // $table->string("nama_jalan");
        // $table->integer("panjang_jalan");
        // $table->string("kelas_jalan");
        return  [
            "No",
            "Jalan",
            "Lokasi",
            "Kode Traffic",
            "Jenis Simpang",
            'Latitude',
            "Longitude",
            "Tahun Pemasangan",
            "Pengaturan Fase",
            "Tipe Tiang",
            "Kondisi",
            "Keterangan"
        ];
    }

    public function map($row): array
    {
        static $counter = 0;
        $counter++;
        return [
            $counter,
            $row->jalan->name,
            $row->lokasi,
            $row->kode,
            $row->jenis_simpang,
            $row->latitude,
            $row->longitude,
            $row->tahun_pemasangan,
            $row->pengaturan_fase,
            $row->tipe_tiang,
            $row->kondisi,
            $row->keterangan,
        ];
    }
}
