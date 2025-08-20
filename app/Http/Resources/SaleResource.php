<?php
namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class SaleResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'customer' => $this->customer->name,
            'total_amount' => number_format($this->total_amount, 2),
            'sale_date' => Carbon::parse($this->sale_date)->format('Y-m-d'),
            'items' => $this->saleItems->map(function ($item) {
                return [
                    'product' => $item->product->name,
                    'quantity' => $item->quantity,
                    'price' => number_format($item->price, 2),
                    'discount' => number_format($item->discount, 2),
                    'subtotal' => number_format(($item->price * $item->quantity) - $item->discount, 2)
                ];
            })
        ];
    }
}