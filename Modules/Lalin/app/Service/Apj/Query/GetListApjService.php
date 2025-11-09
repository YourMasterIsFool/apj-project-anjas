<?php

namespace Modules\Lalin\app\Service\Apj\Query;

use App\Data\Request\PaginationRequest;
use Modules\Lalin\Models\TApj;
use Modules\Lalin\Models\TJApj;

use function App\Helper\cursorPaginationHelper;

class GetListApjService
{
    public function execute(PaginationRequest $pagination, bool $is_export = false)
    {

        if ($is_export) {
        }
        $query = TApj::query();
        $query = $query->with(['jalan:id,nama_jalan as name']);
        $query = cursorPaginationHelper($query, $pagination);

        return $query;
    }
}
