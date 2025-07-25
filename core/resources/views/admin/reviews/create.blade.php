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
	<form class="form-horizontal" action="{{route('reviews.store')}}" method="POST" enctype="multipart/form-data" data-parsley-validate novalidate>
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
						<label for="image" class="col-sm-2 col-form-label">Image (500x500px)</label>
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
						<label for="position" class="col-sm-2 col-form-label">Position</label>
						<div class="col-sm-8">
							<input type="text" name="position" class="form-control" id="position" placeholder="Position">
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
				  <a href="{{route('reviews.index')}}" class="btn btn-primary btn-rounded w-md waves-effect waves-light m-b-5" style="width:100%;">BACK</a>
			   </div>
			</div>
		</div>
	</form>
@endsection