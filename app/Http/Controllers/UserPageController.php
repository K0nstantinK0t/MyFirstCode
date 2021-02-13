<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Cookie;

class UserPageController extends Controller
{
    public function showUserPage(Request $request)
    {
        $countPostsPerPage = $request->session()->get('countPostsPP', 9); // need for pagination
        if ($request->has('countPostsPerPage')) {
            $countPostsPerPage = $request->input('countPostsPerPage');
            // update information
            $request->session()->put('countPostsPP', $countPostsPerPage);
        }
        // Pagination
        $posts = Auth::user()->posts()->orderBy('created_at', 'desc')->paginate($countPostsPerPage);
        return view('userpage', ['posts' => $posts, 'countPPP' => $countPostsPerPage]);
    }
}
