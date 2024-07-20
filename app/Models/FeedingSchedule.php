<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedingSchedule extends Model
{
    use HasFactory;

    protected $fillable = ['dinosaur_id', 'feeding_time', 'food_type', 'quantity'];

    public function dinosaur()
    {
        return $this->belongsTo(Dinosaur::class);
    }
}
