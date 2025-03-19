<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    public function product()
    {
        return $this->hasMany(Product::class);
    }
    public function purchase()
    {
        return $this->hasMany(Purchase::class);
    }
}
