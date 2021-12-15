<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\TradeCreateRequest;
use App\Trade;
use Illuminate\Http\Request;

class TradeController extends Controller
{
    public function store(TradeCreateRequest $request){
        $trade = Trade::create($request->all());

        return \response()->json($trade, 201);

    }
}
