<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'contact_email',
        'contact_phone',
        'address',
        'descriptions',
        'user_id'
    ];

    //nasim
    function loanAp()
    {
        return $this->hasMany(LoanApplication::class);
    }
    // rubel

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
