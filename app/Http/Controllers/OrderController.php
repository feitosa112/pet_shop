<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderExecuteRequest;
use App\Models\OrderItemsModel;
use App\Repositories\OrderRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    private $orderRepo;


    public function __construct(OrderRepository $orderRepo) {
        $this->orderRepo = $orderRepo;
    }

    public function orderExecute(OrderExecuteRequest $request){

        $cart = Session::get('cart',[]);

        if($cart != null){
            $order = $this->orderRepo->getOrderExecute($cart,$request);

            foreach($cart as $product){
                OrderItemsModel::create([
                    'product_id' => $product->id,
                    'order_id' => $order->id,
                ]);
            }
        }


            Session::forget('cart');

            return redirect(route('home'))->with('oredrExecute','Uspjesno ste izvrsili narudzbu');
        }
}
