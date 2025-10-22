<?php

namespace App\Exports\Modules\Lalin\app\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Modules\Lalin\Models\TJalan as ModelsTJalan;

class JalanExport implements FromCollection, WithHeadings, WithMapping
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
            "Kode Jalan",
            "Nama Jalan",
            "Panjang Jalan",
            "Kelas Jalan"
        ];
    }

    public function map($row): array
    {
        static $counter = 0;
        $counter++;
        return [
            $counter,
            $row->kode_jalan,
            $row->nama_jalan,
            $row->panjang_jalan,
            $row->kelas_jalan
        ];
    }
}
