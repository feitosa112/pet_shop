<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductControler extends Controller
{
    public function productDetails($name,$id){
        $product = ProductModel::where('id',$id)->with('categories')->get();
        if($product){
            return view('templates.product_details',compact('product'));
        }else{
            return view('templates.error404');

        }
    }

    public function addToCart($id){
        $product = ProductModel::find($id);
        if($product->amount > 0){
            $cart = Session::get('cart',[]);
            $cart[$id] = $product;
            Session::put('cart',$cart);


            return redirect()->back()->with('success', 'Proizvod je dodat u korpu.');
        }
        else
        {
            return redirect()->back()->with('amount', 'Proizvoda nema trenutno na stanju');
        }
    }

    public function cartView(){
        $cart = Session::get('cart',[]);
        $total = 0;
        foreach($cart as $product){
            $total+=$product->price;
        }
        return view('cart',compact('cart','total'));
    }
}
