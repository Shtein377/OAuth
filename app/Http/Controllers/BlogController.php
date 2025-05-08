<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function __invoke()
    {
        $posts = Post::query()
        ->latest()
        ->paginate(11);

        return view('blog.index',compact('posts'));
    }
}
