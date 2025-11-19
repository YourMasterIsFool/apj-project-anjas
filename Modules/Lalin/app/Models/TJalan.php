<?php

namespace Modules\Lalin\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

// use Modules\Lalin\Database\Factories\TJalanFactory;

class TJalan extends Model
{
    use HasFactory;

    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at'];
    // ATAU
    protected $fillable = ['kode_jalan', 'nama_jalan', 'panjang_jalan', 'kelas_jalan'];

    // protected static function newFactory(): TJalanFactory
    // {
    //     // return TJalanFactory::new();
    // }
}
