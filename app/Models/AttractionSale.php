<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttractionSale extends Model
{
    use HasFactory;

    protected $fillable = ['attraction_id', 'date', 'quantity', 'total_revenue'];

    public function attraction()
    {
        return $this->belongsTo(Attraction::class);
    }
}
