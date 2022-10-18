<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'categorie_id',
        'unit_id',
        'name',
        'description',
        'stock',
        'price',
        'image'
    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    public function category()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class); 
    }
}
