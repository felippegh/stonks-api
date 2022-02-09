<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StockResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return  [
            'name' => $this->resource->name,
            'symbol' => $this->resource->symbol,
            'open' => $this->resource->open,
            'high' => $this->resource->high,
            'low' => $this->resource->low,
            'close' => $this->resource->close,
        ];
    }
}
