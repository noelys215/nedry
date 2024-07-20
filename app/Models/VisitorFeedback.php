<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitorFeedback extends Model
{
    use HasFactory;

    protected $fillable = ['visitor_name', 'email', 'feedback', 'rating', 'type', 'reference_id'];

    public function location()
    {
        return $this->belongsTo(Location::class, 'reference_id');
    }
}
