<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lang extends Model
{
    use HasFactory;
    protected $table = 'langs';
    protected $fillable = [
        'key',
        "vi",
        "en",
        "ja",
        "ka",
        "ko",
        "zh",
    ];
}
