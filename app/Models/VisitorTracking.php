<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitorTracking extends Model
{
    use HasFactory;

    protected $fillable = ['visitor_count', 'location_id', 'date'];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
