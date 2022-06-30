<x-admin-master>

    @section('content')
    
    <h1> EDIT A POST </h1>
    @foreach($errors->all() as $error)
                    <p class="into-text">{{ $error}} </p>
                    @endforeach 
    <form action="{{route('post.update', $post->id)}}" method="post" enctype="multipart/form-data"
    
    >
    
        @csrf
        @method('PATCH')
    <div class="form-group">
        <label for="title">Title</label>
        <input id="title" class="form-control" type="text" name="title" placeholder="Enter title" value="{{$post->title}}">
    </div>
    
    <div class="form-group">
        <img src="{{$post->getPostImageAttribute($post->post_image)}}" height="150" width="150">
        <label for="file">Image</label>
        <input id="post_image" class="form-control-file" type="file" name="post_image"  >
    </div>
    
    
    <div class="form-group">
      <textarea name="body" class="form-control" id="body" name="body" cols="30" rows="10">{{$post->body}}</textarea>
    </div>
    
    <button type="submit" class="btn btn-primary"> Submit </button>
    
    </form>
    @endsection
    </x-admin-master>