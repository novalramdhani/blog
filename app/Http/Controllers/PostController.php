<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\{Category, Tag, Post};
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->paginate(6);

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create', [
            'post' => new Post(),
            'categories' => Category::get(),
            'tags' => Tag::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $attr = $request->all();

        request()->file('thumbnail')
                    ? $thumbnail = request()->file('thumbnail')->store('images/posts')
                    : null;

        $attr['slug'] = Str::slug($request->title . '-' . Str::random(20));
        $attr['category_id'] = request('category');
        $attr['thumbnail'] = $thumbnail;

        $post = auth()
                ->user()
                ->posts()
                ->create($attr);

        $post->tags()
             ->attach(request('tags'));

        return redirect()
               ->route('posts.index')
               ->with('success', 'The new post was created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', [
            'post' => $post,
            'categories' => Category::get(),
            'tags' => Tag::get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        $attr = $request->all();

        $this->authorize('update', $post);

        if(request()->file('thumbnail')) {
            $thumbnail = request()
                            ->file('thumbnail')
                            ->store('images/posts');
            Storage::delete($post->thumbnail);
        } else {
            $thumbnail = $post->thumbnail;
        }

        request()->file('thumbnail')
                    ? $thumbnail = request()->file('thumbnail')->store('images/posts')
                    : null;

        $attr['category_id'] = request('category');
        $attr['thumbnail'] = $thumbnail;

        $post->update($attr);
        $post->tags()
             ->sync(request('tags'));

        return redirect()
               ->route('posts.index')
               ->with('success', 'The post was updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Storage::delete($post->thumbnail);
        $post->tags()->detach();
        $post->delete();

        $this->authorize('delete', $post);

        return redirect()
               ->route('posts.index')
               ->with('success', 'The post was deleted successfully.');
    }
}
