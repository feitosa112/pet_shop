<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItemsModel extends Model
{
    protected $table = 'order_items';

    protected $fillable = [
        'product_id',
        'order_id',
        'quantity',
    ];
    use HasFactory;
}
