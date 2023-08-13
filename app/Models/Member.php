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
}
