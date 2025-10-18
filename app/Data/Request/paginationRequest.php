<?php

namespace App\Data\Request;

use Spatie\LaravelData\Data;

class PaginationRequest extends Data
{
    public function __construct(
        public int $limit = 10,
        public ?string $cursor = null,
        public ?string $search = null
    ) {}
}
