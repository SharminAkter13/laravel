<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
protected $fillable = [
    'user_email',
    'title',
    'location',
    'category',
    'tags',
    'description',
    'application_email',
    'application_url',
    'closing_date',
    'company_name',
    'website',
    'tagline',
    'cover_image',
    'status',
];
}
