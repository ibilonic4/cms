<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{




  public function index()
  {
       //svi postovi logiranog usera

     $posts = auth()->user()->posts()->paginate(5);
     


    return view('admin/posts/index', compact('posts'));
  }

    public function show(Post $post){

        return view('blog-post', compact('post'));
    }

 public function create(){

  $this->authorize('create',Post::class);

return view('admin/posts/create');

 }

 public function store(Request $request){

  $this->authorize('create',Post::class);

     $inputs = $request->validate([
             'title'=> 'required|min:8|max:225',
             'post_image' => 'file',
             'body' => 'required'
          ]);
         

    

           if(request('post_image')){ 
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

    //ovo binda logiranog usera za post koji je napravio, pri updateu se to ne koristi jer bi promjenilo kreatora
      auth()->user()->posts()->create($inputs);
      
      Session::flash('created-message', 'new post was created');

      return redirect()->route('post.index');
      
 }

 public function destroy(Post $post){


  $this->authorize('delete',$post);
  $post->delete();

  Session::flash('message', 'Post was deleted');

  return back();

 }


 public function edit(Post $post){
  
   $this->authorize('view',$post);

 
  return view('admin/posts/edit', compact('post'));
 }



 public function update (Post $post){

  $inputs = request()->validate([
    'title'=> 'required|min:8|max:225',
    'post_image' => 'file',
    'body' => 'required'
 ]);

    if(request('post_image')){ 
  $inputs['post_image']= request('post_image')->store('images');
  $post->post_image = $inputs['post_image'];}

$post->title = $inputs['title'];
$post->body = $inputs['body'];

//gleda update metodu u PostPolicy.php
     $this->authorize('update',$post);


  $post->save();

   
  Session::flash('updated-message', 'new post was updated');

  return redirect()->route('post.index');
 }
}
