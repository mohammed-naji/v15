<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $guarded = [];

    function flag() {
        return $this->hasOne(Flag::class, 'c_id')->withDefault(['image' => 'No Image']);
    }
}
