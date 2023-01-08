<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['category_id','user_id','shop_id','product_name','product_code','product_qty','slug','price','discount','size','color','short_description','long_description','meta_tag','meta_description','status'];


    public function main_image(): BelongsTo
    {
        return $this->belongsTo(Media::class,'id','parent_id')->where('type','product_main_image');
    }

    public function other_images(): BelongsTo
    {
        return $this->belongsTo(Media::class,'id','parent_id')->where('type','product_other_image');
    }



}
