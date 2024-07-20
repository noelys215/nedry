<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodDrinkSale extends Model
{
    use HasFactory;

    protected $fillable = ['item', 'price', 'quantity', 'total_revenue', 'date'];
}

