<?php

namespace App\Models;

use App\Models\Traits\HasPrimaryUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketComment extends Model
{
    use HasFactory, HasPrimaryUuid;
    public $incrementing = false;

    protected $keyType = 'string';
}
