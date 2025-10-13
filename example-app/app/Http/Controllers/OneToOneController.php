<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class OneToOneController extends Controller
{
    public function index()
    {
        $profiles = Profile::all();
        // return $profiles;
        return view('index', compact('profiles'));
    }


}
