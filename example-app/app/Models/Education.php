<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $fillable = [
        'resume_id', 'degree', 'field_of_study', 'school',
        'edu_from', 'edu_to', 'edu_description', 'edu_logo'
    ];

    public function resume()
    {
        return $this->belongsTo(Resume::class);
    }
}
