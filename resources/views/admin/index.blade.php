<x-admin-master>

@section('content')

@if(auth()->user()->userHasRole('User','Admin'))
<h1 class="h3 mb-4 text-gray-800">Dashboard</h1>

@endif



@if(session()->has('success'))

<div class="alert-danger"> {{session('success')}} </div>
@endif
@endsection


</x-admin-master>