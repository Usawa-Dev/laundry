<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;
protected $fillable = [
    'code',
    'user_id',
    'status',
    'customer_id',
    'confirmed'
];



protected $casts = [
    'status' => 'boolean',
];



    public function products(){
        return $this->hasMany(Product::class);
    }

    public function customer() : BelongsTo {
        return $this->belongsTo(Customer::class);
    }
}
