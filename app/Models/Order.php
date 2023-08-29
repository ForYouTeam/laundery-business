<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'order';
    protected $fillable = [
        'costumer',
        'phone',
        'email',
        'status',
        'paket_id',
    ];

    public function scopepaket($query)
    {
        return $query
            ->leftJoin('paket as m0', 'order.paket_id', '=', 'm0.id')
            ->select(
                'order.id',
                'order.costumer',
                'order.phone',
                'order.email',
                'order.status',
                'order.paket_id',
                'm0.name as paket'

            );
    }
}
