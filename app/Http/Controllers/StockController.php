<?php

namespace App\Http\Controllers;

use App\Http\Requests\StockPriceRequest;
use App\Http\Resources\StockResource;
use App\Http\Resources\UserStockHistoryResource;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class StockController extends Controller {

    public function getCurrentStockPrice(StockPriceRequest $request) {

        $stockId = $request->get('q');

        $json = Cache::remember('stooq-key', 30, function () use ($stockId) {
            $response = Http::get("https://stooq.com/q/l/?s=$stockId&f=sd2t2ohlcvn&e=json");

            if ($response->status() === 200) {
                return json_decode($response->body(), true);
            }
            return null;
        });

        if ($json) {
            $internalJson = Arr::first(Arr::get($json, 'symbols'));

            $stock = Auth::user()->stocks()->create($internalJson);
        }

        return response()->json(new StockResource($stock));
    }

    public function getUserHistory() {

        $stocks = Cache::remember('stooq-history-key', 30, fn() => Auth::user()->stocks);

        return response()->json(UserStockHistoryResource::collection($stocks));
    }
}
