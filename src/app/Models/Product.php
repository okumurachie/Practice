<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'member_id',
        'name',
        'price',
        'image',
        'comment'
    ];
    protected $dates = ['display_date'];
    
    public function member()
    {
        return $this->belongsTo(Member::class);
    }
    public function purchase()
    {
        return $this->hasMany(Purchase::class);
    }
}
