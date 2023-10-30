<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $table = 'district';

    protected $fillable = [
        'pay_area_code', 'parent_code', 'province', 'name', 'full_name', 'status'
    ];

    public $timestamps = true;
}
