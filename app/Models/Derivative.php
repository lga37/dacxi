<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Derivative extends Model
{
    use HasFactory;

    protected $fillable = ['slug','symbol','market','index_id','price','price_percentage_change_24h','contract_type','index',
    'basis','spread','funding_rate','index','open_interest','volume_24h','last_traded_at','expired_at',];
}
