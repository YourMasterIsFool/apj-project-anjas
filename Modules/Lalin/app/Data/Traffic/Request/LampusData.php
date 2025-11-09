<?php

namespace Modules\Lalin\app\Data\Traffic\Request;

use Spatie\LaravelData\Data;

use Spatie\LaravelData\Attributes\Validation\Rule;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\Validation\StringType;
use Spatie\LaravelData\Attributes\Validation\Email;
use Symfony\Component\HttpKernel\DataCollector\DataCollector;

class LampusData extends Data
{

    public function __construct(

        public ?int  $durasi,
        public ?string  $type,

    ) {}
}
