<?php

namespace Modules\Lalin\app\Service\Traffic\Command;

use Error;
use Illuminate\Support\Facades\DB;
use Modules\Lalin\app\Data\Traffic\Request\CreateTrafficRequestData;
use Modules\Lalin\enum\TrafficType;
use Modules\Lalin\Models\TTraffic;

use function PHPUnit\Framework\isIterable;

class CreateTrafficService
{
    public function __construct() {}
    public function execute(CreateTrafficRequestData $data, TrafficType $type)
    {

        DB::beginTransaction();
        try {

            $model =  new TTraffic();
            $model->lokasi = $data->lokasi;
            $model->kode = $data->kode;
            $model->jalan_id = $data->jalan_id;
            $model->latitude = $data->latitude;
            $model->longitude = $data->longitude;
            $model->jenis_simpang = $data->jenis_simpang;
            $model->tipe_tiang = $data->tipe_tiang;
            $model->pengaturan_fase = $data->pengaturan_fase ?? null;
            $model->tahun_pemasangan = $data->tahun_pemasangan;
            $model->kondisi = $data->kondisi;
            $model->keterangan = $data->keterangan;
            $model->type = $type->value;
            $model->save();

            if ($data->list_lampu && isIterable($data->list_lampu)) {
                $model->list_lampu()->createMany($data->list_lampu->toArray());
            }


            DB::commit();
            return $model;
        } catch (\Exception $e) {
            DB::rollBack();

            throw new Error("failed created" . $e->getMessage());
        }
    }
}
