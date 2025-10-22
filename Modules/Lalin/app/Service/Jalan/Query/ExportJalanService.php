<?php

namespace Modules\Lalin\app\Service\Jalan\Query;

use App\Data\Request\PaginationRequest;
use Modules\Lalin\Models\TJalan;


class ExportJalanService
{
    public function execute(PaginationRequest $pagination)
    {

        $query = TJalan::query()
            ->when($pagination->search, function ($query) use ($pagination) {

                return $query->where("nama_jalan", "ilike", "%" . $pagination->search . "%");
            });
        return $query->get();
    }
}
