<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'extra_price_id',
        'mechanic',
        'total'
    ];

    public function sales()
    {
        return $this->hasOne(Sales::class);
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function extra()
    {
        return $this->belongsTo(ExtraPrice::class);
    }
}
