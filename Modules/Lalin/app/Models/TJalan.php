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
    protected $fillable = [];

    // protected static function newFactory(): TJalanFactory
    // {
    //     // return TJalanFactory::new();
    // }
}
