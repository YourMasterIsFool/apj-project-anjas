<?php

namespace Modules\Lalin\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Lalin\Database\Factories\TTrafficLampuFactory;

class TTrafficLampu extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ["durasi", 'type', 'traffic_id'];

    // protected static function newFactory(): TTrafficLampuFactory
    // {
    //     // return TTrafficLampuFactory::new();
    // }

    public function traffic()
    {
        return $this->belongsTo(TTraffic::class, 'traffic_id', 'id');
    }
}
