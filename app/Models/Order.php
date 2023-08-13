<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = '';
    protected $fillable = [
        'costumer',
        'phone',
        'email',
        'status',
        'paket_id',
    ];
}

