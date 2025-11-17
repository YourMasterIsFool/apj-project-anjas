<?php

namespace Modules\Lalin\app\Data\Apj\Request;

use Spatie\LaravelData\Data;

use Spatie\LaravelData\Attributes\Validation\Rule;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\Validation\StringType;
use Spatie\LaravelData\Attributes\Validation\Email;

class CreateApjRequestData extends Data
{
    public function __construct(
        #[Required]
        public int $jalan_id,
        #[Required]
        public string $kode_tiang,

        public ?string $latitude,

        public ?string $longitude,

        public ?string $jenis,

        public ?string $tipe_tiang,

        public ?string $lokasi_detail,

        public ?string $keterangan,
        #[Required]
        public int $tahun_pemasangan,


    ) {}
}
