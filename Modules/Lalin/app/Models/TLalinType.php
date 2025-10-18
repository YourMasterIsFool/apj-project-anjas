<?php

namespace Modules\Lalin\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Lalin\Database\Factories\TLalinTypeFactory;

class TLalinType extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): TLalinTypeFactory
    // {
    //     // return TLalinTypeFactory::new();
    // }
}
