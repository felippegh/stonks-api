<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use JsonSerializable;

class UserStockHistoryResource extends StockResource {

    /**
     * Transform the resource into an array.
     * @param Request $request
     * @return array|Arrayable|JsonSerializable
     */
    public function toArray($request) {
        return array_merge([
            'date' => $this->resource->created_at,
        ], parent::toArray($request));
    }
}
