<?php

namespace Modules\Lalin\app\Service\Jalan\Command;

use Error;
use Illuminate\Support\Facades\DB;
use Modules\Lalin\Models\TJalan;

class DeleteJalanService
{
    public function execute($id)
    {

        DB::beginTransaction();
        try {
            $model = TJalan::findOrFail($id);
            $model->delete();

            DB::commit();

            return $model;
        } catch (\Exception) {

            DB::rollBack();
            throw new Error("Error delete");
        }
    }
}
