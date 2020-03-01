<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = "books";

    public $timestamps = true;

    protected $fillable = [
        'title',
        'author',
        'ISBN',
        'year',
        'number_pages',
        'price'
    ];
}
