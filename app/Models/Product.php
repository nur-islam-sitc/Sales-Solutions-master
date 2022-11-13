<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['category_id','user_id','shop_id','product_name','slug','price','discount','size','color','short_description','long_description','meta_tag','meta_description','status'];
}
