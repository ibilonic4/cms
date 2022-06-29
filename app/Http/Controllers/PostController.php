<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function show(Post $post){

        return view('blog-post', compact('post'));
    }

 public function create(){
return view('admin/posts/create');

 }

 public function store(Request $request){

auth()->user();

 }
}
