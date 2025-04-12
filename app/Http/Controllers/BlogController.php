<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {

        $post = (object) [
            'id'=> '1',
            'title'=>'Good evening',
            'description'=>'Lorem wonderful parent',
        ];

        $posts = array_fill(0,10,$post);

      

        return view('blog.index', compact('posts'));
    }

    public function show($post)
    {

        $post = (object) [
            'id'=> '1',
            'title'=>'Good evening',
            'description'=>'Lorem wonderful parent',
        ];


        return view("blog.show",compact('post'));
    }


    public function like()
    {

        return "Like+1 blog";
    }
}
