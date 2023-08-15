<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'branch_id',
        'user_id',
        'status',
        'email',
        'mobile',
        'business_name',
        'member_no',
        'gender',
        'city',
        'address',
        'credit_source',
        'photo',
        'nid',
        'birth_certificate',
        'guaranter_name',
        'guaranter_id',
        'guaranter_address'
    ];

    public function deposit()
    {
        return $this->hasMany(Deposit::class);
    }
    public function withdrawl()
    {
        return $this->hasMany(WithdrawDeposit::class);
    }
    //nasim
    function loanAp()
    {
        return $this->hasMany(LoanApplication::class);
    }

    //rubel
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
    public function guranter()
    {
        return $this->belongsTo(Guaranter::class, 'guaranter_id', 'id');
    }
}
