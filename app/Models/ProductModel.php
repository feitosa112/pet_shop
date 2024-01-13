<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    protected $table='products';

    protected $fillable=[
        'name',
        'description',
        'price',
        'amount',
        'category_id',
        'img1',
        'img2',
        'img3',
        'img4',
        'img5',
        'img6',


    ];
    use HasFactory;

    public function categories(){
        return $this->hasMany(Category_model::class,'id','category_id');
    }
}
