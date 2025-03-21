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

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
