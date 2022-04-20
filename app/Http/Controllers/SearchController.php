<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
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

    public function tag()
    {
        $queryTag = request('query');

        $tags = Tag::where("name", "like", "%$queryTag%")
                     ->latest()
                     ->paginate(6);

        return view('posts.index', compact('tags'));
    }
}
