<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;


class OneToManyController extends Controller
{
    public function index()
    {
    $comments = Comment::all();
        // return $comments;
        return view('post', compact('comments'));
    }
}
