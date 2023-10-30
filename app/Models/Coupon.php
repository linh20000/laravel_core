<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $table = 'coupon_code';

    protected $fillable = [
        'id', 'name', 'discount_code', 'description', 'discount', 'duration', 'school_id', 'comment', 'del_flag', 'total_code',
    ];

    public $timestamps = true;
}
