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
        #[Required, StringType]
        public string $kode_tiang,

        #[Required()]
        public string $latitude,

        #[Required()]
        public string $longitude,

        #[Required()]
        public string $jenis,

        #[Required, StringType]
        public string $tipe_tiang,

        #[Required, StringType]
        public string $lokasi_detail,

        #[Required, StringType]
        public string $keterangan,
        #[Required]
        public int $tahun_pemasangan,


    ) {}
}
