<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();
        return inertia('Index',compact('posts'));
    }
    public function create(){
        return inertia('Create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);
        Post::create([
            'title' => $request->title,
            'body' => $request->body
        ]);
        return inertia('Index' );
    }
}
