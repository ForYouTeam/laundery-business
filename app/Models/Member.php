<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $table = 'member';
    protected $fillable = [
        'name',
        'nik',
        'address',
        'phone',
        'email',
        'laundry_id',
        'verify',
        'user_id',
    ];

    public function scopeWithLaundryAndUser($query)
    {
        return $query
            ->leftJoin('laundry as m0', 'member.laundry_id', '=', 'm0.id')
            ->leftJoin('users as m1', 'member.user_id', '=', 'm1.id')
            ->select(
                'member.id',
                'member.name',
                'member.nik',
                'member.address',
                'member.phone',
                'member.email',
                'member.laundry_id',
                'm0.name as laundry',
                'member.verify',
                'member.user_id',
                'm1.name as user'
            );
    }
}
