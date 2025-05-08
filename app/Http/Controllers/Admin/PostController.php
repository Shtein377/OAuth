<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Posts\SavePostRequest;
use Illuminate\Http\Request;

class PostController extends Controller
{
    
    public function index()
    {
        $posts = Post::query()
        ->latest('created_at')
        ->paginate(3);

        return view('admin.posts.index', [
            'posts' => $posts,
        ]);
    }

   
    public function create()
    {
        return view('admin.posts.create', [
            'post' => new Post,
        ]);
    }

  
    public function store(SavePostRequest $request)
    {

        // dd($request->all());
        Post::query()->create($request->validated());
        
        return to_route('admin.posts.index');
    }

    public function show(Post $post)
    {
        //
    }

    
    public function edit(Post $post)
    {
        return view('admin.posts.edit', [
        'post' => $post
        ]);
    }

    public function update(SavePostRequest $request, Post $post)
    {
        $post->update($request->validated());

        return to_route('admin.posts.index');
    }

  
    public function destroy(Post $post)
    {
        $post->delete();
        return to_route('admin.posts.index');
    }
}
