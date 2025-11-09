<?php

namespace Modules\Lalin\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Lalin\Database\Factories\TApjFactory;

class TApj extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    protected $table = 't__apjs';





    // protected static function newFactory(): TApjFactory
    // {
    //     // return TApjFactory::new();
    // }


    public function jalan()
    {
        return $this->belongsTo(TJalan::class, 'jalan_id', 'id');
    }
}
