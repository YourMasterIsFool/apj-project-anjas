<?php

namespace Modules\Lalin\app\Service\Apj\Command;

use Error;
use Illuminate\Support\Facades\DB;
use Modules\Lalin\app\Data\Apj\Request\CreateApjRequestData;
use Modules\Lalin\Models\TApj;

class CreateApjService
{
    public function __construct() {}
    public function execute(CreateApjRequestData $data)
    {

        DB::beginTransaction();
        try {
            $model =  new TApj();
            $model->jalan_id = $data->jalan_id;
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
