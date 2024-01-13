<?php

namespace App\Services;

use App\Models\ProductModel;
use Illuminate\Support\Collection;

class AllProductsServices {
    public function allProducts(){
        $allProducts = ProductModel::with('categories')->get();

        return $allProducts;
    }


}
