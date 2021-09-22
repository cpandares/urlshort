<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UrlShortener extends Model
{
    protected $table = 'url_shorteners';

    protected $fillable = [

        'to_url',
        'url_key',
        'nsfw',
        'visited'
   
    ];
}
