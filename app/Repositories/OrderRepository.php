<?php

namespace App\Repositories;

use App\Models\OrderModel;
use Illuminate\Support\Facades\Auth;

class OrderRepository {
    private $orderModel;

    public function __construct(OrderModel $orderModel) {
        $this->orderModel = $orderModel;
    }

    public function getOrderExecute($cart,$request){
        if(Auth::check()){
            $user = Auth::user();
            $total_amount = 0;

            foreach($cart as $item){
                $total_amount+=$item->price;
            }

        }

         return $this->orderModel->create([
            'user_id'=>$user->id,
            'status'=>'Naruceno',
            'total_amount'=>$total_amount,
            'address'=>$request->input('address'),
            'phone'=>$request->input('phone'),
            'city'=>$request->input('city'),
            'postcode'=>$request->input('postcode')
        ]);
    }
}
