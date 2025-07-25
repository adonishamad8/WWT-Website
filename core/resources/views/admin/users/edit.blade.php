@extends('layouts.cmslayout')
	@section('content')
	@if(session()->has('message'))
		<div class="alert alert-success">
			{{session()->get('message')}}
		</div>
	@endif
	@if($errors->all())
		<div class="alert alert-danger">
			<ul>
			@foreach($errors->all() as $error)
				<li>{{$error}}</li>			
			@endforeach
			</ul>
		</div>
	@endif
    <form class="form-horizontal" action="{{route('users.update', $user->id)}}" method="POST" enctype="multipart/form-data" data-parsley-validate novalidate>
		@method('put')
		@csrf
		<div class="row">
			<div class="col-xl-8">
			   <div class="card-box">
				  <h4 class="header-title m-t-0 m-b-30">Edit Content</h4>
				  	<div class="form-group row">
						<div class="col-md-1"></div>
						<label for="image" class="col-sm-2 col-form-label">Image (500x500px)</label>
						<div class="col-md-9">
							@if($user->getFirstMediaUrl('user'))
							<div class="col-md-3 gallery-pages">
								<div class="thumbnail">
									<div class="caption" style="display: none;">
										<h4>Image</h4>
										<p>
										   <a href="{{$user->getFirstMediaUrl('user', 'thumb-large')}}" data-lightbox="example-set" class="example-image-link badge badge-success">View</a>
										   <button id="remove-image" class="badge badge-danger">Remove</button>
										</p>
									</div>
									<img class="article-image" src="{{$user->getFirstMediaUrl('user', 'thumb')}}" width="100">
								</div>
							</div>
							@endif
							<input type="file" name="image" class="form-control input-medium">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-1"></div>
						<label for="first_name" class="col-sm-2 col-form-label">First Name</label>
						<div class="col-sm-8">
							<input type="text" name="first_name" value="{{$user->first_name}}" class="form-control" id="first_name" placeholder="First Name">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-1"></div>
						<label for="last_name" class="col-sm-2 col-form-label">Last Name</label>
						<div class="col-sm-8">
							<input type="text" name="last_name" value="{{$user->last_name}}" class="form-control" id="last_name" placeholder="Last Name">
						</div>
					</div>

				  <div class="form-group row">
					<div class="col-md-1"></div>
					<label for="email" class="col-sm-2 col-form-label">Email</label>
					<div class="col-sm-8">
						<input type="email" name="email" value="{{$user->email}}" class="form-control" id="email" placeholder="Email">
					 </div>
				  </div>
				  <div class="form-group row">
					<div class="col-md-1"></div>
					<label for="password" class="col-sm-2 col-form-label">Password</label>
					<div class="col-sm-8">
						<input type="password" name="password" value="" class="form-control" id="password" placeholder="Password">
					 </div>
				  </div>
				  <div class="form-group row">
					<div class="col-md-1"></div>
					<label for="phone" class="col-sm-2 col-form-label">Phone</label>
					<div class="col-sm-8">
						<input type="number" name="phone" value="{{$user->phone}}" class="form-control" id="phone" placeholder="Phone">
					 </div>
				  </div>
					<div class="form-group row">
						<div class="col-md-1"></div>
						<label for="permission" class="col-sm-2 col-form-label">Permissions</label>
						<ul class="permission-box">
							@foreach($permissions as $permission)
							<li>
								<div class="checkbox checkbox-primary">
									<input id="{{ $permission->id }}" type="checkbox" name="permission[]" value="{{ $permission->id }}"
									@if($user->permissions->contains($permission->id)) checked=checked @endif>
									<label for="{{ $permission->id }}"> {{ $permission->name }}</label>
								</div>
							</li>
							@endforeach
						</ul>
					</div>
			   </div>
			</div>
			<div class="col-xl-4">
			   <div class="card-box">
				<h4 class="header-title m-t-0 m-b-30">Action</h4>
				<button type="submit" class="btn btn-success btn-rounded w-md waves-effect waves-light m-b-5" style="width:100%;">UPDATE</button>
				<a href="{{route('users.create')}}" class="btn btn-secondary btn-rounded w-md waves-effect waves-light m-b-5" style="width:100%;">ADD NEW</a>
				<a href="{{route('users.index')}}" class="btn btn-primary btn-rounded w-md waves-effect waves-light m-b-5" style="width:100%;">BACK</a>
			   </div>
			</div>
		</div>
	</form>
@endsection
@section('scripts')
<script>
	jQuery(document).ready(function () {
		$('.thumbnail').hover(
			function () {
				$(this).find('.caption').slideDown(250);
			},
			function () {
				$(this).find('.caption').slideUp(250);
			}
		);
		$("#remove-image").click(function(event){
            if (confirm('Are you sure you want to delete?')) {
                var input = $("<input>")
                .attr("type", "hidden")
                .attr("name", "delete_existing_image")
                .attr("value", 1);
                $("#form").append(input);
            }
			else{
				return false;
			}
		});
	});
</script>
@endsection