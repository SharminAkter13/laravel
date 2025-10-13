<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
     public function index()
     
    {
        $cats = Category::all();
        return view('pages.category.categories',compact('cats'));
    }

    
       public function create()
    {
        return view('pages.category.create');
    }

    public function store(Request $request)
    {

        Category::create($request->only([
            'name',
            'amount',
            'price',
        ]));
        // dd($request->all());


        return Redirect::to('/category');
    }

    
    public function destroy(Request $request)
    {
        $product = Category::find($request->catagory_id);
        $product->delete();
        return Redirect::to('/category');
}
 public function update($catagory_id)
    {
        $cat = Category::find($catagory_id);
        return view('pages.category.edit',compact('cat'));
    }
    
       public function editStore(Request $request)
    {
       $cat = Category::find($request->catagory_id);
        $cat->name = $request->name;
        $cat->amount = $request->amount;
        $cat->price = $request->price;
        $cat->save();
        return Redirect::to('/category');
    }

}