<?php

namespace Modules\Lalin\app\Service\Traffic\Query;

use App\Data\Request\PaginationRequest;
use Modules\Lalin\enum\TrafficType;
use Modules\Lalin\Models\TTraffic;
use Modules\Lalin\Models\TJTraffic;

use function App\Helper\cursorPaginationHelper;

class GetListTrafficService
{
    public function execute(PaginationRequest $pagination, TrafficType $type)
    {


        $query = TTraffic::query();
        $query = $query->where("type", $type->value);
        $query = cursorPaginationHelper($query, $pagination);
        return $query;
    }
}
