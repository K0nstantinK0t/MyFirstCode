<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReadPostController extends Controller
{
    public function index($postID)
    {
        $post = Auth::user()->posts()->findOrFail($postID);
        return view('ReadPost.index', ['post' => $post]);
    }
}
