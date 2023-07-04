<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'books';

    // protected $fillable = [
    //     'name', 'cover', 'publisher', 'page_count', 'price'
    // ];

    protected $guarded = [];
}
