<?php

namespace App\Transformers;

use Carbon\Carbon;
use League\Fractal\TransformerAbstract;

class ProductTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform($product)
    {
        return [
            'id' => $product->id,
            'name' => $product->name,
            'description' => $product->description,
            'currency' => $product->currency,
            'qty' => 1,
            'price' => $product->price,
            'discount' => $product->discount,
            'percent' => round(($product->discount/$product->price) * 100, 0),
            'created' => $product->created_at->format('d-m-Y'),
        ];
    }
}
