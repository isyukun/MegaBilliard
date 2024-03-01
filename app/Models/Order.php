<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'fnb_id', 'quantity'
    ];

    // Definisikan relasi dengan model FnB
    public function fnb()
    {
        return $this->belongsTo(Fnb::class);
    }
}
