<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'amount',
        'interest',
        'description',
        'status',
        'member_id',

    ];

    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }
    public function withdraw()
    {
        return $this->hasMany(WithdrawDeposit::class);
    }
}
