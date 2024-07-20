<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalRecord extends Model
{
    use HasFactory;

    protected $fillable = ['dinosaur_id', 'checkup_date', 'treatment_details', 'doctor_id'];

    public function dinosaur()
    {
        return $this->belongsTo(Dinosaur::class);
    }

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }
}
