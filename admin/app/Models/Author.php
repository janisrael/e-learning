<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    const NAME = "authors";
    protected $table = 'author';
    public $timestamps = true;

    protected $fillable = [
        'last_name',
        'first_name',
        'image_url',
        'created_by'
    ];

    protected $hidden = ['created_by','created_at','updated_at'];
}
