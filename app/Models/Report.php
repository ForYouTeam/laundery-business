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

    public function scopemember($query)
    {
        return $query
            ->leftJoin('member as m0', 'report.member_id', '=', 'm0.id')
            ->select(
                'report.id',
                'report.member_id',
                'm0.name as member',
                'report.total_order',
                'report.progress',
                'report.canceled',
                'report.done',
                'report.income',
                'report.start',
                'report.end'
            );
    }
}
