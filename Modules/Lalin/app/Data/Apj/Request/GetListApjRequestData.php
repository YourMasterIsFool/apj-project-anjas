<?php

namespace Modules\Lalin\app\Data\Apj\Request;

use App\Data\Request\PaginationRequest;

class GetListApjRequestData extends PaginationRequest
{
    public function __construct(
        ?int $limit = 10,
        ?string $cursor = null,
        ?string $search = null,
        public ?int $jalan_id,
        public ?string $jenis
    ) {
        return parent::__construct($limit, $cursor, $search);
    }
}
