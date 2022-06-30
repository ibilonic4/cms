<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Session;
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
      auth()->user()->posts()->create($inputs);
      
      Session::flash('created-message', 'new post was created');

      return redirect()->route('post.index');
      
 }

 public function destroy(Post $post){

  $post->delete();

  Session::flash('message', 'Post was deleted');

  return back();

 }


 public function edit(Post $post){
  
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

  auth()->user()->posts()->save($post);

   
  Session::flash('updated-message', 'new post was updated');

  return redirect()->route('post.index');
 }
}
