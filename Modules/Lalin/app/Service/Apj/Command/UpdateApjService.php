<?php

namespace Modules\Lalin\app\Service\Apj\Command;

use Error;
use Illuminate\Support\Facades\DB;
use Modules\Lalin\app\Data\Apj\Request\CreateApjRequestData;
use Modules\Lalin\Models\TApj;

class UpdateApjService
{
    public function __construct() {}
    public function execute($id, CreateApjRequestData $data)
    {

        DB::beginTransaction();
        try {
            $model = TApj::find($id);
            $model->lokasi_nama_jalan = $data->lokasi_nama_jalan;
            $model->kode_tiang = $data->kode_tiang;
            $model->latitude = $data->latitude;
            $model->longitude = $data->longitude;
            $model->jenis = $data->jenis;
            $model->tipe_tiang = $data->tipe_tiang;
            $model->lokasi_detail = $data->lokasi_detail;
            $model->keterangan = $data->keterangan;
            $model->tahun_pemasangan = $data->tahun_pemasangan;
            $model->save();
            DB::commit();
            return $model;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new Error("failed created" . $e->getMessage());
        }
    }
}
