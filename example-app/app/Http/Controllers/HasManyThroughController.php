<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;

class HasManyThroughController extends Controller
{
    use HasFactory;
      public function index()
    {
        $applications = Application::with('deployments')->get();
        // return $applications;
        return view('pages.has_many_through', compact('applications'));

     
    }
}
