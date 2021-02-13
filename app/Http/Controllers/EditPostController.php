<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EditPostController extends Controller
{
    public function index($postID)
    {
        return view('EditPost.index', [
            'post' => Auth::user()->posts()->findOrFail($postID)
        ]);
    }
    public function editPost(Request $request, $postID)
    {
        $request->validate([
            'title' => 'required',
            'text' => 'required'
        ]);
        $inputData = $request->only(['title', 'text']);
        $user = Auth::user()->posts()->findOrFail($postID)->update([
            'title' => $inputData['title'],
            'text' => $inputData['text']
        ]);
        return back()->with('message', 'Note updated successful');
    }
}
