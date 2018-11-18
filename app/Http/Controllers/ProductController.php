<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Transformers\ProductTransformer;

class ProductController extends Controller
{
    public function show()
    {
        return  fractal(Product::all(), new ProductTransformer)->respond();
    }
}
