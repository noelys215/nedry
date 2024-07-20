<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SouvenirSale extends Model
{
    use HasFactory;

    protected $fillable = ['shop_id', 'item', 'price', 'quantity', 'total_revenue', 'date'];

    public function souvenirShop()
    {
        return $this->belongsTo(SouvenirShop::class, 'shop_id');
    }
}
