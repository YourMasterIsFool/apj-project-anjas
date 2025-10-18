<?php

namespace Modules\Lalin\app\Service\Jalan\Command;

use Error;
use Illuminate\Support\Facades\DB;
use Modules\Lalin\app\Data\Jalan\Request\CreateJalanRequestData;
use Modules\Lalin\Models\TJalan;

class CreateJalanService
{
    public function __construct() {}
    public function execute(CreateJalanRequestData $data)
    {

        DB::beginTransaction();
        try {
            $model =  new TJalan();
            $model->kode_jalan = $data->kode_jalan;
            $model->nama_jalan = $data->nama_jalan;
            $model->panjang_jalan = $data->panjang_jalan;
            $model->kelas_jalan = $data->kelas_jalan;
            $model->save();

            DB::commit();
            return $model;
        } catch (\Exception $e) {
            DB::rollBack();

            throw new Error("failed created" . $e->getMessage());
        }
    }
}
