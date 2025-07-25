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
	<form class="form-horizontal" action="{{route('boards.store')}}" method="POST" enctype="multipart/form-data" data-parsley-validate novalidate>
		@csrf
		<div class="row">
			<div class="col-xl-8">
			   <div class="card-box">
				  <h4 class="header-title m-t-0 m-b-30">Edit Content</h4>
					<div class="row translate-bg">
						<div class="col-sm-12">
							<div class="tab-content">
								<div class="form-group row">
									<div class="col-md-1"></div>
									 <label for="titleEn" class="col-sm-2 col-form-label">Title</label>
									 <div class="col-sm-8">
										<input type="text" name="name" class="form-control" id="titleEn" placeholder="Title">
									 </div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-1"></div>
						<label for="image" class="col-sm-2 col-form-label">Image (1000x1000px)</label>
						<div class="col-sm-8">
							<input type="file" name="image" class="form-control" id="image">
						</div>
					</div>
					<div class="row translate-bg">
						<div class="col-sm-12">
							<div class="tab-content">
								<div class="form-group row">
									<div class="col-md-1"></div>
									 <label for="DescEn" class="col-sm-2 col-form-label">Description</label>
									 <div class="col-sm-8">
										<textarea id="editor-en" name="description"></textarea>
									 </div>
								</div>
							</div>
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
						<label for="phone" class="col-sm-2 col-form-label">Phone</label>
						<div class="col-sm-8">
							<input type="text" name="phone" class="form-control" id="phone" placeholder="Phone">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-1"></div>
						<label for="position" class="col-sm-2 col-form-label">Position</label>
						<div class="col-sm-8">
							<input type="text" name="position" class="form-control" id="position" placeholder="Position">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-1"></div>
						<label for="facebook" class="col-sm-2 col-form-label">Facebook</label>
						<div class="col-sm-8">
							<input type="text" name="facebook" class="form-control" id="facebook" placeholder="Facebook">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-1"></div>
						<label for="twitter" class="col-sm-2 col-form-label">Twitter</label>
						<div class="col-sm-8">
							<input type="text" name="twitter" class="form-control" id="twitter" placeholder="Twitter">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-1"></div>
						<label for="instagram" class="col-sm-2 col-form-label">Instagram</label>
						<div class="col-sm-8">
							<input type="text" name="instagram" class="form-control" id="instagram" placeholder="Instagram">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-1"></div>
						<label for="linkedin" class="col-sm-2 col-form-label">Linkedin</label>
						<div class="col-sm-8">
							<input type="text" name="linkedin" class="form-control" id="linkedin" placeholder="Linkedin">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-1"></div>
						<label for="order" class="col-sm-2 col-form-label">Order</label>
						<div class="col-sm-8">
							<input type="number" name="order" class="form-control" id="order" placeholder="Order">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-1"></div>
						<label for="published" class="col-sm-2 col-form-label">Published</label>
						<div class="col-sm-1">
							<label class="switch">
								<input type="checkbox" name="published" class="form-control" id="published" value="1">
								<span class="slider round"></span>
							</label>
						</div>
					</div>
			   </div>
			</div>
			<div class="col-xl-4">
			   <div class="card-box">
				  <h4 class="header-title m-t-0 m-b-30">Action</h4>
				  <button type="submit" class="btn btn-success btn-rounded w-md waves-effect waves-light m-b-5" style="width:100%;">SAVE</button>
				  <a href="{{route('boards.index')}}" class="btn btn-primary btn-rounded w-md waves-effect waves-light m-b-5" style="width:100%;">BACK</a>
			   </div>
			</div>
		</div>
	</form>
@endsection