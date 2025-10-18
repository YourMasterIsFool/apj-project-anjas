<?php

namespace Modules\Lalin\app\Service\Apj\Command;

use Error;
use Illuminate\Support\Facades\DB;
use Modules\Lalin\Models\TApj;

class DeleteApjService
{
    public function execute($id)
    {

        DB::beginTransaction();
        try {
            $model = TApj::findOrFail($id);
            $model->delete();

            DB::commit();

            return $model;
        } catch (\Exception) {

            DB::rollBack();
            throw new Error("Error delete");
        }
    }
}
