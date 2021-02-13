<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeletePostController extends Controller
{
    public function index($postID)
    {
        Auth::user()->posts()->findOrFail($postID)->delete();
        return back()->with('message', 'Post deleted successful');
    }
}
