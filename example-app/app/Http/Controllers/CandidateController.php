<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CandidateController extends Controller
{
         public function index()
     
    {
        $cnd = Candidate::all();
        return view('pages.candidate.candidates',compact('cnd'));
    }

    
       public function create()
    {
        return view('pages.candidate.create-candidate');
    }

    public function store(Request $request)
    {

        Candidate::create($request->only([
            'name',
            'amount',
            'price',
        ]));
        // dd($request->all());


        return Redirect::to('/Candidate');
    }

    
    public function destroy(Request $request)
    {
        $product = Candidate::find($request->candidate_id);
        $product->delete();
        return Redirect::to('/Candidate');
}

 public function update($candidate_id)
    {
        $cnd = Candidate::find($candidate_id);
        return view('pages.candidate.edit-candidate',compact('cnd'));
    }

    public function editStore(Request $request)
    {
       $cnd = Candidate::find($request->candidate_id);
        $cnd->name = $request->name;
        $cnd->amount = $request->amount;
        $cnd->price = $request->price;
        $cnd->save();
        return Redirect::to('/Candidate');
    }

}
