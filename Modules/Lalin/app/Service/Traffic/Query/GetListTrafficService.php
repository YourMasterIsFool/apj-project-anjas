<?php

namespace Modules\Lalin\app\Service\Traffic\Query;

use App\Data\Request\PaginationRequest;
use Modules\Lalin\enum\TrafficType;
use Modules\Lalin\Models\TTraffic;
use Modules\Lalin\Models\TJTraffic;

use function App\Helper\cursorPaginationHelper;

class GetListTrafficService
{
    public function execute(?PaginationRequest $pagination, TrafficType $type, bool $is_export = false)
    {



        $query = TTraffic::query();
        $query = $query
            ->where("type", $type->value)->with(['jalan:id,nama_jalan as name']);

        if (!$pagination) {
            return $query->get();
        }
        $query = $query
            ->when($pagination->search, function ($q) use ($pagination) {
                $search = $pagination->search;
                $q->where("jenis_simpang", "like", "%" . $search . "%");
            });
        if ($is_export) {
            return $query->get();
        }

        $query = cursorPaginationHelper($query, $pagination);
        return $query;
    }
}
