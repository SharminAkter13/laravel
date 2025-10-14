<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;


class OneToManyController extends Controller
{
    public function index()
    {
      $post = Post::with('comments')->get();
           return  $post;
         return view('post',compact('post'));   

      // $comments = Comment::with('post')->get();
      //   //    return  $post;
      //    return view('post',compact('comments'));   
        
        
    }
}
