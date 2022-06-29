<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
class PostController extends Controller
{
    public function show(Post $post){

        return view('blog-post', compact('post'));
    }

 public function create(){
return view('admin/posts/create');

 }

 public function store(Request $request){

     $inputs = $request->validate([
             'title'=> 'required|min:8|max:225',
             'post_image' => 'file',
             'body' => 'required'
          ]);
         

    

         if(request('post_image')){ 
      $inputs['post_image']= request('post_image')->store('images');}


    //   Post::create($inputs,[
    //     'user_id' => auth()->id()
    // ]);
      auth()->user()->posts()->create($inputs);

      return back();
      
 }
}
