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
        public ?string $lokasi,
        #[Required]
        public string $kode,
        public ?string $jenis_simpang,
        public ?int $tahun_pemasangan,

        public ?string $latitude,

        public ?string $longitude,

        #
        public ?string $kondisi,

        public ?int $pengaturan_fase,

        public ?string $tipe_tiang,
        public ?string $keterangan,
        #[DataCollectionOf(LampusData::class)]
        public DataCollection $list_lampu,
    ) {}
}
