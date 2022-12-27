<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function shop_logo()
    {
        return $this->belongsTo(Media::class,'id','parent_id')->where('type','shop_logo');
    }

    
}
