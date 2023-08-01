<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    protected $fillable=
    [
        'user_id',
        'transaction_type',
        'amount',
        'total_amount',
        'transaction_id'
    ];
}
