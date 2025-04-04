<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'price',
        'image',
        'comment'
    ];
    protected $dates = ['display_date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function purchases()
    {
        return $this->hasOne(Purchase::class);
    }
}
