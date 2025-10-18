<?php

namespace Modules\Lalin\app\Service\Jalan\Query;

use App\Data\Request\PaginationRequest;
use Modules\Lalin\Models\TJalan;

use function App\Helper\cursorPaginationHelper;

class GetListJalanService
{
    public function execute(PaginationRequest $pagination)
    {

        $query = TJalan::query();
        $query = cursorPaginationHelper($query, $pagination);
        return $query;
    }
}
