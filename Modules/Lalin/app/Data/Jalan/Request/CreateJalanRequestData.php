<?php

namespace Modules\Lalin\app\Data\Jalan\Request;

use Spatie\LaravelData\Data;

use Spatie\LaravelData\Attributes\Validation\Rule;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\Validation\StringType;
use Spatie\LaravelData\Attributes\Validation\Email;

class CreateJalanRequestData extends Data
{
    public function __construct(
        #[Required, StringType]
        public string $kode_jalan,
        #[Required, StringType]
        public string $nama_jalan,
        #[Required, StringType]
        public string $kelas_jalan,
        #[Required()]
        public ?int $panjang_jalan,
    ) {}
}
