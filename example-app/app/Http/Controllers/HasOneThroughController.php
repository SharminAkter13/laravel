<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use App\Models\Mechanic;
use App\Models\Owner;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HasOneThroughController extends Controller
{
     use HasFactory;
      public function index()
    {
        $owners = Mechanic::with('carOwner')->get();
        // return $owners;
        return view('pages.has_one_through', compact('owners'));

     
    }
}
