<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanApplication extends Model
{
    use HasFactory;
    // nasim
    protected $fillable = [
        'loan_product_id',
        'member_id',
        'first_payment_date',
        'release_date',
        'applied_amount',
        'total_payable',
        'total_paid',
        'late_payment_penalties',
        'attachment',
        'installment',
        'description',
        'remarks',
        'status',
        'approved_date',
        'user_id',
        'approved_by',
        'created_by',
        'branch_id'
    ];

    function Branch()
    {
        return $this->belongsTo(Branch::class);
    }

    function Member()
    {
        return $this->belongsTo(Member::class);
    }

    function approved()
    {
        return $this->belongsTo(User::class, 'approved_by', 'id');
    }

    function createdby()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
