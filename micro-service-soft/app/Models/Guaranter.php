<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guaranter extends Model
{
    use HasFactory;
    protected $table = 'guaranters';
    protected $fillable = [
        'name',
        'address',
        'member_id'
    ];
    public function mem()
    {
        return $this->hasMany(Member::class);
    }
    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
