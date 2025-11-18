<?php

namespace App\Helper;

use App\Data\Request\PaginationRequest;
use Illuminate\Database\Eloquent\Model;
use InvalidArgumentException;

function cursorPaginationHelper($query, PaginationRequest $pagination)
{
    // if (!is_subclass_of($modelClass, Model::class)) {
    //     throw new InvalidArgumentException("{$modelClass} must be an instance of Eloquent Model");
    // }

    return $query->cursorPaginate(
        perPage: $pagination->limit,
        cursor: $pagination->cursor,
    );
}
