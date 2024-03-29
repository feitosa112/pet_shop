<?php

namespace App\Http\Controllers;

use App\Models\Category_model;
use App\Models\ProductModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $allProducts = ProductModel::paginate(4);
        $paginator = $allProducts->links()->paginator;
        return view('home', ['allProducts' => $allProducts,'paginator'=>$paginator]);


    }
}
