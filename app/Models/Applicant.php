<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;

    // get service for this applicant
    public function services()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
}
