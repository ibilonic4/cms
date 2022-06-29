<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
class PostController extends Controller
{




  public function index()
  {

    $posts = Post::all();
    return view('admin/posts/index', compact('posts'));
  }

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
         

    

           if(request('post_image')->getrea){ 
        $inputs['post_image']= request('post_image')->store('images');}

      //  if($request->hasFile('post_image')){
      //    $file = $request->file('post_image');
      //    $extension = $file->getClientOriginalExtension();
      //    $fileName = time() . '.' . $extension;
      //    $path = public_path('images');
      //    $file->move($path, $fileName);
      //   $inputs['post_image'] = $path;
      //  }


    //   Post::create($inputs,[
    //     'user_id' => auth()->id()
    // ]);
      auth()->user()->posts()->create($inputs);

      return back();
      
 }
}
