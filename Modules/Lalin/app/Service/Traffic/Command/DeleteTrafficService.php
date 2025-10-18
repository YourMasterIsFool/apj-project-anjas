<?php

namespace Modules\Lalin\app\Service\Traffic\Command;

use Error;
use Illuminate\Support\Facades\DB;
use Modules\Lalin\Models\TTraffic;

class DeleteTrafficService
{
    public function execute($id)
    {

        DB::beginTransaction();
        try {
            $model = TTraffic::findOrFail($id);
            $model->delete();

            DB::commit();

            return $model;
        } catch (\Exception) {

            DB::rollBack();
            throw new Error("Error delete");
        }
    }
}
