<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Winner extends Model
{
    use HasFactory;

    public function userscore()
    {
        return $this->belongsTo(UserScore::class, 'user_id');
    }
}