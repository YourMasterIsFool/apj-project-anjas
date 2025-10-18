<?php

namespace Modules\Lalin\app\Service\Jalan\Query;

use Modules\Lalin\Models\TJalan;

class DetailJalanService
{
    public function execute($id)
    {
        return TJalan::find($id);
    }
}
