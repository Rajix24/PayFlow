<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Delete extends Model
{
        protected $fillable = [
        'token', 
        'user_id',
        'wallet_id',
    ];
}
