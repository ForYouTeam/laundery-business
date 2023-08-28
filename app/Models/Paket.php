<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;
    protected $table = 'paket';
    protected $fillable = [
        'laundry_id',
        'name',
        'description',
        'price',
    ];

    public function scopelaundry($query)
    {
        return $query
            ->leftJoin('laundry as m0', 'paket.laundry_id', '=', 'm0.id')
            ->select(
                'paket.id',
                'paket.laundry_id',
                'm0.name as laundry',
                'paket.name',
                'paket.description',
                'paket.price'
            );
    }
}
