<?php

namespace Modules\Plan\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Plan\Enums\StatusEnum;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "months",
        "price",
        "status"
    ];

    protected $casts = [
        'status' => StatusEnum::class,
    ];
    
}
