<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'text',
        'start_date',
        'end_date',
        'user_id',
        'application_id',
        'applicant_id',
        'job_id'
    ];
}
