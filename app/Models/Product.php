<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Models\SubCategory;
class Product extends Model
{
    use HasFactory;



    protected $casts = [
    'color' => 'array',
    'size' => 'array',

    ];
    public function SubCategory(){
        return $this->belongsTo(SubCategory::class,'subCategory_id');
    }


}
