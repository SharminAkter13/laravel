<?php

namespace App\Http\Controllers;

use App\Models\Employeer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class EmployeerController extends Controller
{
         public function index()
     
    {
        $emp = Employeer::all();
        return view('pages.employeer.employeers',compact('emp'));
    }

    
       public function create()
    {
        return view('pages.create-emp');
    }

    public function store(Request $request)
    {

        Employeer::create($request->only([
            'name',
            'amount',
            'price',
        ]));
        // dd($request->all());


        return Redirect::to('/Employeer');
    }

    
    public function destroy(Request $request)
    {
        $product = Employeer::find($request->employeer_id);
        $product->delete();
        return Redirect::to('/Employeer');
}

 public function update($employeer_id)
    {
        $emp = Employeer::find($employeer_id);
        return view('pages.employeer.edit-emp',compact('emp'));
    }


    public function editStore(Request $request)
    {
       $emp = Employeer::find($request->employeer_id);
        $emp->name = $request->name;
        $emp->amount = $request->amount;
        $emp->price = $request->price;
        $emp->save();
        return Redirect::to('/employeer');
    }

}
