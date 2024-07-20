<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObservationLog extends Model
{
    use HasFactory;

    protected $fillable = ['research_data_id', 'observation', 'date'];

    public function researchData()
    {
        return $this->belongsTo(ResearchData::class);
    }
}
