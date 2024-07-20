<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResearchData extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'researcher_id', 'date_collected'];

    public function researcher()
    {
        return $this->belongsTo(User::class, 'researcher_id');
    }

    public function observationLogs()
    {
        return $this->hasMany(ObservationLog::class);
    }
}
