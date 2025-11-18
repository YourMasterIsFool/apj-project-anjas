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
                $query->where(function ($q) use ($pagination) {
                    $s = strtolower($pagination->search);

                    $q->whereRaw("LOWER(kode_tiang) LIKE ?", ["%$s%"])
                        ->orWhereRaw("LOWER(lokasi_detail) LIKE ?", ["%$s%"])
                        ->orWhereRaw("LOWER(keterangan) LIKE ?", ["%$s%"]);
                });
            })
            ->when($pagination->jalan_id, function ($query) use ($pagination) {
                $query->where("jalan_id", $pagination->jalan_id);
            })
            ->when($pagination->jenis, function ($query) use ($pagination) {
                $query->where("jenis", $pagination->jenis);
            });
        $query = $query->with(['jalan:id,nama_jalan as name']);

        if ($is_export) {
            return $query->get();
        }

        $query = cursorPaginationHelper($query, $pagination);




        return $query;
    }
}
