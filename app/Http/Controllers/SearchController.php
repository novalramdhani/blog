<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function post(Request $request)
    {
         $queryPost = request('query');

         $posts = Post::where("title", "like", "%$queryPost%")
                        ->latest()
                        ->paginate(6);

         return view('posts.index', compact('posts'));
    }
}
