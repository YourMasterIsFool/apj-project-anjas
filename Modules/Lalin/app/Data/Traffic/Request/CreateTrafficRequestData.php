<?php

namespace Modules\Lalin\app\Data\Traffic\Request;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;

use Spatie\LaravelData\Attributes\Validation\Rule;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\Validation\StringType;
use Spatie\LaravelData\Attributes\Validation\Email;
use Spatie\LaravelData\DataCollection;

class CreateTrafficRequestData extends Data
{

    public function __construct(
        #[Required]
        public ?int $jalan_id,
        #[StringType]
        public ?string $lokasi,
        #[Required, StringType]
        public string $kode,
        #[Required, StringType]
        public string $jenis_simpang,
        #[Required()]
        public ?int $tahun_pemasangan,

        #[Required()]
        public ?string $latitude,

        #[Required()]
        public ?string $longitude,

        #
        public ?string $kondisi,

        public ?int $pengaturan_fase,

        #[Required, StringType]
        public string $tipe_tiang,
        #[Required]
        public string $keterangan,
        #[DataCollectionOf(LampusData::class)]
        public DataCollection $list_lampu,
    ) {}
}
