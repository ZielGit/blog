<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index');
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    public function store(PostRequest $request)
    {
        $post = Post::create($request->all());

        if ($request->file('file')) {
            $url = Storage::put('posts', $request->file('file'));

            $post->image()->create([
                'url' => $url
            ]);
        }

        if ($request->tags) {
            $post->tags()->attach($request->tags);
        }
        
        return redirect()->route('admin.posts.index');
    }

    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    public function edit(Post $admin_post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit', compact('admin_post', 'categories', 'tags'));
    }

    public function update(PostRequest $request, Post $post)
    {
        $post->update($request->all());

        if ($request->file('file')) {
            $url = Storage::put('posts', $request->file('file'));

            if ($post->image) {
                Storage::delete($post->image->url);

                $post->image->update([
                    'url' => $url
                ]);
            } else {
                $post->image()->create([
                    'url' => $url
                ]);
            }
        }

        if ($request->tags) {
            $post->tags()->attach($request->tags);
        }

        return redirect()->route('admin.posts.index')->with('info', 'El post se actualizó con éxito');
    }

    public function destroy(Post $post)
    {
        //
    }
}
