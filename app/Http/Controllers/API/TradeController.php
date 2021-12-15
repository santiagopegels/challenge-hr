<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\TradeCreateRequest;
use App\Trade;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TradeController extends Controller
{

    public function index(Request $request)
    {
        $trades = Trade::query()
            ->filter($request->all(['type', 'user_id']))
            ->get();

        return \response()->json($trades);
    }

    public function show($id)
    {
        $trade = Trade::find($id);

        if (is_null($trade)) {
            return \response()->json('ID not found', Response::HTTP_NOT_FOUND);
        }

        return \response()->json($trade);
    }

    public function store(TradeCreateRequest $request)
    {
        $trade = Trade::create($request->all());

        return \response()->json($trade, Response::HTTP_CREATED);
    }
}
