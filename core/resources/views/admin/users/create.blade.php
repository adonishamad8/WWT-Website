@extends('layouts.cmslayout')
	@section('content')
	@if($errors->all())
		<div class="alert alert-danger">
			<ul>
			@foreach($errors->all() as $error)
				<li>{{$error}}</li>			
			@endforeach
			</ul> 
		</div>
	@endif
	<form class="form-horizontal" action="{{route('users.store')}}" method="POST" enctype="multipart/form-data" data-parsley-validate novalidate>
		@csrf
		<div class="row">
			<div class="col-xl-8">
			   <div class="card-box">
				  <h4 class="header-title m-t-0 m-b-30">Edit Content</h4>
				  	<div class="form-group row">
						<div class="col-md-1"></div>
						<label for="image" class="col-sm-2 col-form-label">Image</label>
						<div class="col-sm-8">
							<input type="file" name="image" class="form-control" id="image">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-1"></div>
						<label for="first_name" class="col-sm-2 col-form-label">First Name</label>
						<div class="col-sm-8">
							<input type="text" name="first_name" class="form-control" id="first_name" placeholder="First Name">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-1"></div>
						<label for="last_name" class="col-sm-2 col-form-label">Last Name</label>
						<div class="col-sm-8">
							<input type="text" name="last_name" class="form-control" id="last_name" placeholder="Last Name">
						</div>
					</div>

				  <div class="form-group row">
					<div class="col-md-1"></div>
					<label for="email" class="col-sm-2 col-form-label">Email</label>
					<div class="col-sm-8">
						<input type="email" name="email" class="form-control" id="email" placeholder="Email">
					 </div>
				  </div>
				  <div class="form-group row">
					<div class="col-md-1"></div>
					<label for="password" class="col-sm-2 col-form-label">Password</label>
					<div class="col-sm-8">
						<input type="password" name="password" class="form-control" id="password" placeholder="Password">
					 </div>
				  </div>
				  <div class="form-group row">
					<div class="col-md-1"></div>
					<label for="phone" class="col-sm-2 col-form-label">Phone</label>
					<div class="col-sm-8">
						<input type="number" name="phone" class="form-control" id="phone" placeholder="Phone">
					 </div>
				  </div>
					<div class="form-group row">
						<div class="col-md-1"></div>
						<label for="permission" class="col-sm-2 col-form-label">Permissions</label>
						<ul class="permission-box">
							@foreach($permissions as $permission)
							<li>
								<div class="checkbox checkbox-primary">
									<input id="{{$permission->id}}" type="checkbox" name="permission[]" value="{{ $permission->id }}">
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
				  <button type="submit" class="btn btn-success btn-rounded w-md waves-effect waves-light m-b-5" style="width:100%;">SAVE</button>
				  <a href="{{route('users.index')}}" class="btn btn-primary btn-rounded w-md waves-effect waves-light m-b-5" style="width:100%;">BACK</a>
			   </div>
			</div>
		</div>
	</form>
@endsection