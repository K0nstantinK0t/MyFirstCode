<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class NewPostController extends Controller
{
    public function showPage()
    {
        return view('NewPost.index');
    }
    public function addPost(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'text' => 'required'
        ]);
        $inputData = $request->only(['title', 'text']);
        $user = Auth::user()->posts()->create([
            'title' => $inputData['title'],
            'text' => $inputData['text']
        ]);
        return back()->with('message', 'Note added successful');
    }
}
