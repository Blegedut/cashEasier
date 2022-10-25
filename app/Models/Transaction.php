<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'invoice_id',
        'quantity',
        'unit_id',
        'sub_total'
    ];

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function product()
    {
        return $this->hasOne(Product::class, 'id','product_id');
    }

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}
