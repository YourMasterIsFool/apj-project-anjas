<?php

namespace Modules\Dashboard\app\Service\Query;

use Modules\Lalin\enum\TrafficType;
use Modules\Lalin\Models\TApj;
use Modules\Lalin\Models\TTraffic;

class GetTotalTrafficService
{
    public function execute(TrafficType $type)
    {

        return TTraffic::where('type', $type->value)->count();
    }
}
