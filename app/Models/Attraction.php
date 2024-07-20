<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attraction extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'base_price', 'location_id'];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function attractionSales()
    {
        return $this->hasMany(AttractionSale::class);
    }
}
