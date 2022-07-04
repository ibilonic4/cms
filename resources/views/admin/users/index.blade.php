<x-admin-master>
@section('content')
<h1>all users </h1>

@if(Session::has('user-deleted'))

<div class="alert alert-danger">{{Session::get('user-deleted')}} </div>

@endif
@if(Session::has('created-message'))

<div class="alert alert-success">{{Session::get('created-message')}} </div>

@endif
@if(Session::has('updated-message'))

<div class="alert alert-success">{{Session::get('updated-message')}} </div>

@endif
 <!-- DataTales Example -->
 <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Users</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Id</th>
              <th>Username</th>
              <th>Name</th>
              <th>Email</th>
              <th>Avatar</th>
              <th>Created at</th>
              <th>Updated at</th>
              <th> Delete</th>
      
            </tr>
          </thead>
          <tfoot>
            <tr>
                <th>Id</th>
                <th>Username</th>
                <th>Name</th>
                <th>Email</th>
                <th>Avatar</th>
                <th>Created at</th>
                <th>Updated at</th>
                <th> Delete</th>
            </tr>
          </tfoot>
          <tbody>
            @foreach($users as $user)
            {{--  osigurava da ne vidim samog sebe na popisu --}}
            @if($user != auth()->user())
            <tr>
              <td>{{$user->id}}</td>
              <td>
                <a href="{{route('user.profile.show', $user)}}">{{$user->username}}</a>
              </td>
              <td>{{$user->name}}</td>
              <td>{{$user->email}}</td>
              <td>
                <img src="{{asset($user->getUserImageAttribute($user->avatar))}}"onerror="this.style.display='none'" width="150" height="150">
            </td>
              <td>{{$user->created_at->diffForHumans()}}</td>
              <td>{{$user->updated_at->diffForHumans()}}</td>
             
              <td>

           <form method="post" action="{{route('user.destroy', $user)}}" enctype="multipart/form-data">
            @csrf
            @method('DELETE')
            <button type = "submit" class="btn btn-danger">Delete</button>
           </form>

       
              </td>
            </tr>
            @endif
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

  {{-- {{$users->links()}} --}}
@endsection
@section('scripts')
<!-- Page level plugins -->
<script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

<!-- Page level custom scripts -->
 <script src="{{asset('js/demo/datatables-demo.js')}}"></script> 
@endsection
</x-admin-master>