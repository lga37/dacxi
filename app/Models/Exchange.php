<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exchange extends Model
{
    use HasFactory;

    protected $fillable = ['slug','name','year_established','country','description','url','image',
        'has_trading_incentive','trust_score','trust_score_rank','trade_volume_24h_btc','trade_volume_24h_btc_normalized',];

}
