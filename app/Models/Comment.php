<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $with = ['user', 'replayed'];

    function user() {
        return $this->belongsTo(User::class)->withDefault();
    }

    function replayed() {
        return $this->hasMany(Comment::class, 'replay_to');
    }
}
