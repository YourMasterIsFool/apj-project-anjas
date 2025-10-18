<?php

namespace Modules\Lalin\app\Data\Traffic\Request;

use Spatie\LaravelData\Data;

use Spatie\LaravelData\Attributes\Validation\Rule;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\Validation\StringType;
use Spatie\LaravelData\Attributes\Validation\Email;

class CreateTrafficRequestData extends Data
{



    public function __construct(
        #[Required, StringType]
        public string $lokasi,
        #[Required, StringType]
        public string $kode,
        #[Required, StringType]
        public string $jenis_simpang,
        #[Required()]
        public ?int $tahun_pemasangan,

        #[Required()]
        public ?float $latitude,

        #[Required()]
        public ?float $longitude,
        #[Required, StringType]
        public string $pengaturan_fase,

        #[Required, StringType]
        public string $tipe_tiang,

        #[Required, StringType]
        public string $durasi,

        #[Required, StringType]
        public string $kondisi,
        #[Required, StringType]
        public string $keterangan,
    ) {}
}
