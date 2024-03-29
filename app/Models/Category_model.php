<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category_model extends Model
{
    protected $table ='categories';

    protected $fillable = [
        'category_name',
    ];
    use HasFactory;

    public function products(){
        return $this->hasMany(ProductModel::class,'category_id','id');
    }
}
