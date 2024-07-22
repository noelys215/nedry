<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, Notifiable, HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'role_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function medicalRecords()
    {
        return $this->hasMany(MedicalRecord::class, 'doctor_id');
    }

    public function incidentsReported()
    {
        return $this->hasMany(Incident::class, 'reported_by');
    }

    public function incidentsResolved()
    {
        return $this->hasMany(Incident::class, 'resolved_by');
    }

    public function maintenanceRequestsReported()
    {
        return $this->hasMany(MaintenanceRequest::class, 'reported_by');
    }

    public function maintenanceRequestsAssigned()
    {
        return $this->hasMany(MaintenanceRequest::class, 'assigned_to');
    }

    public function researchData()
    {
        return $this->hasMany(ResearchData::class, 'researcher_id');
    }
}
