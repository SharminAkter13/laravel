<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        'resume_id', 'company_name', 'title',
        'exp_from', 'exp_to', 'exp_description', 'exp_logo'
    ];

    public function resume()
    {
        return $this->belongsTo(Resume::class);
    }
}
