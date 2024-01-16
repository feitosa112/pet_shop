<?php

namespace App\Providers;

use App\Services\AllProductsServices;
use App\Services\CartService;
use App\Services\Categories;
use Illuminate\Database\Schema\Builder;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $allProducts = new AllProductsServices();
        $allProducts = $allProducts->allProducts();



        View::composer('*', function ($view) use ($allProducts) {
            $view->with('allProducts', $allProducts);
        });


        $categories = new Categories();
        $categories = $categories->getCategories();

        View::composer('*', function ($view) use ($categories) {
            $view->with('categories', $categories);
        });





        Builder::defaultStringLength(191);
    }
}
