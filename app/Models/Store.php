<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'zip1',
        'zip2',
        'address',
        'build',
        'contents',
        'url',
        'image',
        'delete_flg'
    ];

    public $timestamps = false;
}

