<?php

namespace App\Observers;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductObserver
{
    public function deleted(Product $product)
    {
        if ($product->image) {  
            Storage::disk('public')->delete($product->image);
        }
    }
}
