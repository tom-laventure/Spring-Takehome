<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserScore extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'points',
        'age',
        'QR_code'
    ];

    public function winners()
    {
        return $this->belongsTo(Winner::class);
    }
}