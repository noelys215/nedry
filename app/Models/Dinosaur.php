<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dinosaur extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'species', 'age', 'health_status', 'location_id', 'threat_level'];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function medicalRecords()
    {
        return $this->hasMany(MedicalRecord::class);
    }

    public function feedingSchedules()
    {
        return $this->hasMany(FeedingSchedule::class);
    }
}
