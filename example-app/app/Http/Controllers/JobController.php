<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class JobController extends Controller
{
        public function index()
     
    {
        $job = Job::all();
        return view('pages.job.jobs',compact('job'));
    }

    
       public function create()
    {
        return view('pages.create-job');
    }

    public function store(Request $request)
    {

        Job::create($request->only([
            'name',
            'amount',
            'price',
        ]));
        // dd($request->all());


        return Redirect::to('/Job');
    }

    
    public function destroy(Request $request)
    {
        $product = Job::find($request->job_id);
        $product->delete();
        return Redirect::to('/Job');
}

 public function update($job_id)
    {
        $job = Job::find($job_id);
        return view('pages.job.edit-job',compact('job'));
    }

       public function editStore(Request $request)
    {
       $job = Job::find($request->job_id);
        $job->name = $request->name;
        $job->amount = $request->amount;
        $job->price = $request->price;
        $job->save();
        return Redirect::to('/job');
    }
}
