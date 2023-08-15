<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;
    protected $table = 'expenses';
    protected $fillable = [
        'user_id',
        'branch_id',
        'expense_category_id',
        'note',
        'cost'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    function category()
    {
        return $this->belongsTo(Expense_category::class, 'expense_category_id', 'id');
    }
}
