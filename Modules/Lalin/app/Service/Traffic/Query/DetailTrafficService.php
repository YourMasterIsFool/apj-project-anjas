<?php

namespace Modules\Lalin\app\Service\Traffic\Query;

use Modules\Lalin\Models\TTraffic;

class DetailTrafficService
{
    public function execute($id)
    {
        return TTraffic::with(['list_lampu'])->find($id);
    }
}
