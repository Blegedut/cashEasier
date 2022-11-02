<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'invoice_id',
        'user_id',
        'quantity',
        'unit_id',
        'sub_total'
    ];

    public function product()
    {
        return $this->hasMany(Product::class);
    }

    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }
}
