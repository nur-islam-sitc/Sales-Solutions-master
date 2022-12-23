<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function landing_theme_image()
    {
        return $this->belongsTo(Media::class,'id','parent_id')->where('type','landing_theme_image');
    }

    public function multiple_theme_image()
    {
        return $this->belongsTo(Media::class,'id','parent_id')->where('type','multiple_theme_image');
    }
}
