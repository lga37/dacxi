<?php

namespace App\Http\Controllers;


use App\Models\Coin;
use Illuminate\Http\Request;

class CoinController extends Controller
{
    
    public function index(Request $request)
    {

        $coins = Coin::simplepaginate(10);
        return view('coins',compact('coins'));

    }
    
}
/*
Bonus 1 The application also stores the following coin prices: DACXI, ETH, ATOM,
LUNA. For this bonus, the endpoints must accept the coin as parameters;
*/