@extends('layouts.cmslayout')
	@section('content')
	<div class="row">
		<div class="col-12">
			<div class="card-box table-responsive">
				<h4 class="m-t-0 header-title">Mice</h4>
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
						<th>Title</th>
						<th>Published</th>
						<th>Action</th>
					</tr>
					</thead>
					<tbody>
					@foreach($mices as $mice)
					<tr>
						<td><img class="img-circle" src="{{$mice->getFirstMediaUrl('mice', 'thumb')}}" width="50"></td>
						<td>{{$mice->name}}</td>
						<td>{!! $mice->published == 1 ? '<span class="badge badge-success">published</span>' : '<span class="badge badge-warning">unpublished</span>' !!}</td>
						<td><a href="{{route('mices.edit', $mice->id)}}" class="btn btn-info btn-xs webtn">Edit</a> 
						<form onsubmit="return confirm('Are you sure you want to delete?');" class="d-inline-block" method="post" action="{{route('mices.destroy', $mice->id)}}">
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
				<a href="{{route('mices.create')}}" class="btn btn-success btn-rounded w-md waves-effect waves-light m-b-5">Add New</a>
			</div>
		</div>
	</div>
  @endsection