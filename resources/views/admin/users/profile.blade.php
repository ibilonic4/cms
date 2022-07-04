<x-admin-master>
@section('content')

<h1> {{$user->name}}'s profile</h1>


<div class="row">

    <div class="col-sm-6">

<form method="post" action="{{route('user.profile.update',$user)}}" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="mb-4">
        <img class="img-profile rounded-circle" onerror="this.style.display='none'"
        src="{{asset($user->getUserImageAttribute($user->avatar))}}" height="150" width="150">
    </div>
    <div class="form-group">
        
        <label for="">Avatar</label>
        <input id="avatar" class="form-control-file {{$errors->has('avatar') ? 'is-invalid' : ''}}"
         type="file" name="avatar"  >
         @error('avatar')
         <div class="alert alert-danger">{{$message}}</div>
     @enderror
    </div>

    <div class="form-group">
        <label for="username">Username</label>
        <input id="username" class="form-control  {{$errors->has('username') ? 'is-invalid' : ''}}"
         type="text" name="username"  value="{{$user->username}}">
        @error('username')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="name">Name</label>
        <input id="name" class="form-control  {{$errors->has('name') ? 'is-invalid' : ''}}"
        type="text" name="name"  value="{{$user->name}}">
        @error('name')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input id="email" class="form-control  {{$errors->has('email') ? 'is-invalid' : ''}}"
         type="text" name="email"  value="{{$user->email}}">
        @error('email')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input id="password" class="form-control  {{$errors->has('password') ? 'is-invalid' : ''}}" 
        type="password" name="password" >
        @error('password')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="password-confirm">Confirm Password</label>
        <input id="password-confirm" class="form-control" type="password" name="password-confirm" >
        @error('password-confirm')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
        
</div></div>

@if(auth()->user()->userHasRole('admin'))
<div class="row">
    <div class="col-sm-12">
  


        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">User Roles</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th> Options </th>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th> Attach </th>
                        <th> Detach</th>
              
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                        <th> Options </th>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th> Attach </th>
                        <th> Detach</th>
                    </tr>
                  </tfoot>
                  <tbody>
                   @foreach($roles as $role)
                   <tr>
                    <td> <input type="checkbox"
                        @foreach ($user->roles as $user_role)
                        @if($user_role->slug == $role->slug)

                        checked 
                        @endif
                        @endforeach
                        > </td>
                    <td> {{$role->id}}</td>
                    <td> {{$role->name}}</td>
                    <td> {{$role->slug}}</td>
                    <td>
                        <form action="{{route('user.role.attach', $user)}}" method="post">
                            @csrf
                            @method('PATCH')
         {{-- hidden input treba da prenesem role id kako bi ga mogao patcaht noramalno --}}
                          <input type="hidden" name="role" value="{{$role->id}}">
                         <button class="btn btn-primary"
                         @if($user->roles->contains($role))
                         disabled

                         @endif
                         >Attach </button>
                        </form>
                        </td>
                    <td>
                        <form action="{{route('user.role.detach', $user)}}" method="post">
                            @csrf
                            @method('PATCH')
                          <input type="hidden" name="role" value="{{$role->id}}">
                        <button class="btn btn-danger"
                        @if(!$user->roles->contains($role))
                        disabled

                        @endif
                        
                        
                        >Detach </button>
                    </form>
                    </td>
                   </tr>
                   @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>












    </div></div> @endif
@endsection
</x-admin-master>