<?php

namespace Modules\Dashboard\app\Service\Query;

use Modules\Lalin\Models\TJalan;

class GetTotalJalanService
{
    public function execute()
    {

        return TJalan::count();
    }
}
