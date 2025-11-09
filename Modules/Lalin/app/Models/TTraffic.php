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

    public function list_lampu()
    {
        return $this->hasMany(TTrafficLampu::class, 'traffic_id', 'id');
    }

    public function jalan()
    {
        return $this->belongsTo(TJalan::class, 'jalan_id', 'id');
    }
}
