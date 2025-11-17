<?php

namespace Modules\Lalin\app\Service\Apj\Query;

use App\Data\Request\PaginationRequest;
use Modules\Lalin\app\Data\Apj\Request\GetListApjRequestData;
use Modules\Lalin\Models\TApj;
use Modules\Lalin\Models\TJApj;

use function App\Helper\cursorPaginationHelper;

class GetListApjService
{
    public function execute(?GetListApjRequestData $pagination, bool $is_export = false)
    {

        $query = TApj::query();
        // dd($pagination);
        $query = $query
            ->when($pagination->search, function ($query) use ($pagination) {
                return $query->where("kode_tiang", "like", "%" . $pagination->search . "%")
                    ->orWhere("kondisi", "like", "%" . $pagination->search . "%")
                    ->orWhere("lokasi_detail", "like", "%" . $pagination->search . "%")
                    ->orWhere("keterangan", "like", "%" . $pagination->search . "%");
            })
            ->when($pagination->jalan_id, function ($query) use ($pagination) {
                $query->where("jalan_id", $pagination->jalan_id);
            })
            ->when($pagination->jenis, function ($query) use ($pagination) {
                $query->where("jenis", $pagination->jenis);
            });
        if ($is_export) {
            return $query->get();
        }

        $query = $query->with(['jalan:id,nama_jalan as name']);
        $query = cursorPaginationHelper($query, $pagination);

        // dd($query);

        return $query;
    }
}
