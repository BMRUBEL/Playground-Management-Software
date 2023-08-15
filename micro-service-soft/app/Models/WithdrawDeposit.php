<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WithdrawDeposit extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'date',
        'status',
        'member_id',
        'deposit_id',
    ];
    public function memberinfo()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }
    public function depositinfo()
    {
        return $this->belongsTo(Deposit::class, 'deposit_id');
    }
}
