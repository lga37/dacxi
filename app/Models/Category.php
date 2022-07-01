<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['slug','name','market_cap','market_cap_change_24h','content','top_3_coins','volume_24h'];

 
    protected $casts = [
        'top_3_coins'=> 'array',
    ];
}
