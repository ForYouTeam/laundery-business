<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $table = 'report';
    protected $fillable = [
        'member_id',
        'total_order',
        'progress',
        'canceled',
        'done',
        'income',
        'start',
        'end',
    ];
}
