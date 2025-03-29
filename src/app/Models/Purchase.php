<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'product_id',
        'recipient',
    ];
    protected $dates = ['display_date'];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}
