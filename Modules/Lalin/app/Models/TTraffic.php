<?php

namespace Modules\Lalin\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Lalin\Database\Factories\TTrafficFactory;

class TTraffic extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): TTrafficFactory
    // {
    //     // return TTrafficFactory::new();
    // }
}
