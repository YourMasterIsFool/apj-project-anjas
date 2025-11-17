<?php

namespace Modules\Dashboard\app\Service\Query;

use Modules\Lalin\Models\TApj;

class GetTotalApjService
{
    public function execute()
    {

        return TApj::count();
    }
}
