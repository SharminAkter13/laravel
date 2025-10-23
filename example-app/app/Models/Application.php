<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
     public function deployments()
    {
        return $this->hasManyThrough(Deployment::class, Environment::class);
    }

     public function environments()
    {
        return $this->hasMany(Environment::class);
    }
}
