<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
class ProductGallery extends Model
{



    public function Product(){
        return $this->belongsTo(Product::class,'product_id');
    }
    use HasFactory;
}
