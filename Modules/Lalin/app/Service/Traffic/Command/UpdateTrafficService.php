<?php

namespace Modules\Lalin\app\Service\Traffic\Command;

use Error;
use Illuminate\Support\Facades\DB;
use Modules\Lalin\app\Data\Traffic\Request\CreateTrafficRequestData;
use Modules\Lalin\Models\TTraffic;

class UpdateTrafficService
{
    public function __construct() {}
    public function execute($id, CreateTrafficRequestData $data)
    {

        DB::beginTransaction();
        try {
            $model = TTraffic::find($id);
            $model->lokasi = $data->lokasi;
            $model->kode = $data->kode;
            $model->latitude = $data->latitude;
            $model->longitude = $data->longitude;
            $model->jenis_simpang = $data->jenis_simpang;
            $model->tipe_tiang = $data->tipe_tiang;
            $model->pengaturan_fase = $data->pengaturan_fase;
            $model->durasi = $data->durasi;
            $model->tahun_pemasangan = $data->tahun_pemasangan;
            $model->kondisi = $data->kondisi;
            $model->keterangan = $data->keterangan;
            $model->save();
            DB::commit();
            return $model;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new Error("failed created" . $e->getMessage());
        }
    }
}
