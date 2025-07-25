@extends('layouts.cmslayout')
	@section('content')
	<div class="row">
		<div class="col-12">
			<div class="card-box table-responsive">
				<h4 class="m-t-0 header-title">Users</h4>
				<br>
				@if(session()->has('message'))
					<div class="alert alert-success">
						{{session()->get('message')}}
					</div>
				@endif
				<table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
					<thead>
					<tr>
						<th>Image</th>
						<th>Full Name</th>
						<th>Email</th>
						<th>Phone</th>
						<th>Action</th>
					</tr>
					</thead>
					<tbody>
					@foreach($users as $user)
					<tr>
						<td><img class="img-circle" src="{{$user->getFirstMediaUrl('user', 'thumb')}}" width="50"></td>
						<td>{{$user->first_name}} {{$user->last_name}}</td>
						<td>{{$user->email}}</td>
						<td>{{$user->phone}}</td>
						<td><a href="{{route('users.edit', $user->id)}}" class="btn btn-info btn-xs webtn">Edit</a> 
						<form onsubmit="return confirm('Are you sure you want to delete?');" class="d-inline-block" method="post" action="{{route('users.destroy', $user->id)}}">
						@csrf
							@method('delete')
							<button type="submit" class="btn btn-danger btn-xs webtn">Delete</button>
						</form>
						</td>
					</tr>
					@endforeach
					</tbody>
				</table>
				<hr>
				<a href="{{route('users.create')}}" class="btn btn-success btn-rounded w-md waves-effect waves-light m-b-5">Add New</a>
			</div>
		</div>
	</div>
  @endsection