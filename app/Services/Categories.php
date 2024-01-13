<?php

namespace App\Services;

use App\Models\Category_model;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Collection;

class Categories {
    protected $categories;

    public function __construct()
    {
        $this->categories = $this->getCategories();
        $this->shareCategoriesWithViews();
    }

    public function getCategories()
    {
        $categories = Category_model::pluck('name');
        return $this->formatResults($categories);
    }

    protected function formatResults(Collection $results)
    {
        return $results->toArray();
    }

    protected function shareCategoriesWithViews()
    {
        View::share('categories', $this->categories);
    }
}
