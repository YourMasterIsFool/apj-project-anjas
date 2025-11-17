<?php

namespace Modules\Lalin\app\Service\Jalan\Query;

use App\Data\Request\PaginationRequest;
use Modules\Lalin\Models\TJalan;

use function App\Helper\cursorPaginationHelper;

class GetListJalanService
{
    public function execute(?PaginationRequest $pagination, bool $is_export = false)
    {
        $query = TJalan::query();

        if (!$pagination) {
            return $query->get();
        }
        $query = $query
            ->when($pagination->search, function ($query) use ($pagination) {
                return $query->where("nama_jalan", "like", "%" . $pagination->search . "%")
                    ->orWhere("kode_jalan", "like", "%" . $pagination->search . "%");
            });
        if ($is_export) {
            return $query->get();
        }


        $query = cursorPaginationHelper($query, $pagination);
        return $query;
    }
}
