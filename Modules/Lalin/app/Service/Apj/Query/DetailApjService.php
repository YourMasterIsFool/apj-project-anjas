<?php

namespace Modules\Lalin\app\Service\Apj\Query;

use Modules\Lalin\Models\TApj;

class DetailApjService
{
    public function execute($id)
    {
        return TApj::find($id);
    }
}
