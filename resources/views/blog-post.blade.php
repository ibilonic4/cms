<x-home-master>

@section('content')
<!-- Title -->
<h1 class="mt-4">{{$post->title}}</h1>

<!-- Author -->
<p class="lead">
  by
  <a href="#">{{$post->user->name}}</a>
</p>

<hr>

<!-- Date/Time -->
<p>Posted {{$post->created_at->diffForHumans()}}</p>

<hr>

<!-- Preview Image -->
<img class="img-fluid rounded" src="{{$post->post_image}}" alt=""onerror="this.style.display='none'">

<hr>

<!-- Post Content -->
<p class="lead">{{$post->body}} </p>

<hr>
@if(auth()->check())
<!-- Comments Form -->
<div class="card my-4">
  <h5 class="card-header">Leave a Comment:</h5>
  <div class="card-body">
     <form method="post" action="{{route('comment.store')}}"> 
    @csrf
      <input type="hidden" name="post_id" value="{{$post->id}}">
      <div class="form-group">
        <textarea class="form-control" rows="3" name="text"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>
@endif
<!-- Single Comment -->

 @foreach($post->comments as $comment) 
<!-- Comment with nested comments -->
<div class="media mb-4">
  <img class="d-flex mr-3 rounded-circle" src="{{asset($comment->user->avatar)}}" alt="">
  <div class="media-body">
    <h5 class="mt-0">{{auth()->user()->username}}</h5>
   {{$comment->text}}

  </div>
</div>
 @endforeach 
 
@endsection

</x-home-master>