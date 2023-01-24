<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Page extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','shop_id','title','slug','page_content','theme','status'];

    protected $casts = [
        'user_id' => 'integer',
        'shop_id' => 'integer',
        'theme' => 'integer',
        'status' => 'integer'
    ];

    public function theme(): HasOne
    {
        return $this->hasOne(Theme::class, 'id', 'theme');
    }
}
