<?php

namespace Modules\Lalin\app\Service\Traffic\Command;

use Error;
use Illuminate\Support\Facades\DB;
use Modules\Lalin\app\Data\Traffic\Request\CreateTrafficRequestData;
use Modules\Lalin\Models\TTraffic;

use function PHPUnit\Framework\isIterable;

class UpdateTrafficService
{
    public function __construct() {}
    public function execute($id, CreateTrafficRequestData $data)
    {

        DB::beginTransaction();
        try {
            $model =  TTraffic::find($id);
            $model->lokasi = $data->lokasi;
            $model->kode = $data->kode;
            $model->jalan_id = $data->jalan_id;
            $model->latitude = $data->latitude;
            $model->longitude = $data->longitude;
            $model->jenis_simpang = $data->jenis_simpang;
            $model->tipe_tiang = $data->tipe_tiang;
            $model->pengaturan_fase = $data->pengaturan_fase ?? null;
            $model->tahun_pemasangan = $data->tahun_pemasangan;
            $model->keterangan = $data->keterangan;
            $model->kondisi = $data->kondisi;
            $model->save();


            $model->list_lampu()->delete();
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
