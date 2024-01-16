<?php

namespace App\Services;

use App\Models\ProductModel;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class AllProductsServices {
    public function allProducts(): LengthAwarePaginator {
        return ProductModel::paginate(4);
    }
}
