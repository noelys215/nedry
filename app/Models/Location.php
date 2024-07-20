<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'type', 'parent_location_id'];

    public function parent()
    {
        return $this->belongsTo(Location::class, 'parent_location_id');
    }

    public function children()
    {
        return $this->hasMany(Location::class, 'parent_location_id');
    }

    public function dinosaurs()
    {
        return $this->hasMany(Dinosaur::class);
    }

    public function incidents()
    {
        return $this->hasMany(Incident::class);
    }

    public function maintenanceRequests()
    {
        return $this->hasMany(MaintenanceRequest::class);
    }

    public function visitorTrackings()
    {
        return $this->hasMany(VisitorTracking::class);
    }

    public function attractions()
    {
        return $this->hasMany(Attraction::class);
    }

    public function souvenirShops()
    {
        return $this->hasMany(SouvenirShop::class);
    }

    public function visitorFeedbacks()
    {
        return $this->hasMany(VisitorFeedback::class, 'reference_id');
    }
}
