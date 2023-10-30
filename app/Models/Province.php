<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    protected $table = 'province';

    protected $fillable = [
        'province_code', 'province_name', 'province_desc', 'province_code_im', 'shop_code', 'is_active'
    ];

    public $timestamps = true;
}
