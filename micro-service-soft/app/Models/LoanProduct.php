<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanProduct extends Model
{
    use HasFactory;
    //nasim
    protected $fillable = [
        'name',
        'minimum_amount',
        'maximum_amount',
        'late_payment_penalties',
        'description',
        'interest_rate',
        'term',
        'term_period',
        'status'
    ];
}
