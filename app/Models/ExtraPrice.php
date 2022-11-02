<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExtraPrice extends Model
{
    use HasFactory;

    protected $fillable = [
        'service',
        'steam'
    ];

    public function product()
    {
        return $this->hasOne(Invoice::class);
    }
}
