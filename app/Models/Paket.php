<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;
    protected $table = '';
    protected $fillable = [
        'Laundry',
        'name',
        'description',
        'price',
    ];
}


