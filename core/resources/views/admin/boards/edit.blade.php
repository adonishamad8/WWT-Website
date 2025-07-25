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
    <form id="form" class="form-horizontal" action="{{route('boards.update', $board->id)}}" method="POST" enctype="multipart/form-data" data-parsley-validate novalidate>
		@method('put')
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
										<input type="text" name="name" class="form-control" value="{{$board->name}}" id="titleEn" placeholder="Title">
									 </div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-1"></div>
						<label for="image" class="col-sm-2 col-form-label">Image (1000x1000px)</label>
						<div class="col-md-9">
							@if($board->getFirstMediaUrl('board'))
							<div class="col-md-3 gallery-pages">
								<div class="thumbnail">
									<div class="caption" style="display: none;">
										<h4>Image</h4>
										<p>
										   <a href="{{$board->getFirstMediaUrl('board', 'thumb-large')}}" data-lightbox="example-set" class="example-image-link badge badge-success">View</a>
										   <button id="remove-image" class="badge badge-danger">Remove</button>
										</p>
									</div>
									<img class="article-image" src="{{$board->getFirstMediaUrl('board', 'thumb')}}" width="100">
								</div>
							</div>
							@endif
							<input type="file" name="image" class="form-control input-medium">
						</div>
					</div>
					<div class="row translate-bg">
						<div class="col-sm-12">
							<div class="tab-content">
								<div class="form-group row">
									<div class="col-md-1"></div>
									 <label for="DescEn" class="col-sm-2 col-form-label">Description</label>
									 <div class="col-sm-8">
										<textarea id="editor-en" name="description">{{$board->description}}</textarea>
									 </div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-1"></div>
						<label for="email" class="col-sm-2 col-form-label">Email</label>
						<div class="col-sm-8">
							<input type="email" name="email" class="form-control" id="email" value="{{$board->email}}" placeholder="Email">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-1"></div>
						<label for="phone" class="col-sm-2 col-form-label">Phone</label>
						<div class="col-sm-8">
							<input type="text" name="phone" class="form-control" id="phone" value="{{$board->phone}}" placeholder="Phone">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-1"></div>
						<label for="position" class="col-sm-2 col-form-label">Position</label>
						<div class="col-sm-8">
							<input type="text" name="position" class="form-control" value="{{$board->position}}" id="position" placeholder="Position">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-1"></div>
						<label for="facebook" class="col-sm-2 col-form-label">Facebook</label>
						<div class="col-sm-8">
							<input type="text" name="facebook" class="form-control" value="{{$board->facebook}}" id="facebook" placeholder="Facebook">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-1"></div>
						<label for="twitter" class="col-sm-2 col-form-label">Twitter</label>
						<div class="col-sm-8">
							<input type="text" name="twitter" class="form-control" value="{{$board->twitter}}" id="twitter" placeholder="Twitter">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-1"></div>
						<label for="instagram" class="col-sm-2 col-form-label">Instagram</label>
						<div class="col-sm-8">
							<input type="text" name="instagram" class="form-control" value="{{$board->instagram}}" id="instagram" placeholder="Instagram">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-1"></div>
						<label for="linkedin" class="col-sm-2 col-form-label">Linkedin</label>
						<div class="col-sm-8">
							<input type="text" name="linkedin" class="form-control" value="{{$board->linkedin}}" id="linkedin" placeholder="Linkedin">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-1"></div>
						<label for="order" class="col-sm-2 col-form-label">Order</label>
						<div class="col-sm-8">
							<input type="number" name="order" class="form-control" value="{{$board->order}}" id="order" placeholder="Order">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-1"></div>
						<label for="published" class="col-sm-2 col-form-label">Published</label>
						<div class="col-sm-1">
							<label class="switch">
								<input type="checkbox" name="published" class="form-control" id="published" value="1" {{ ($board->published=="1")? "checked" : "" }}>
								<span class="slider round"></span>
							</label>
						</div>
					</div>
			   </div>
			</div>
			<div class="col-xl-4">
			   <div class="card-box">
				<h4 class="header-title m-t-0 m-b-30">Action</h4>
				<button type="submit" class="btn btn-success btn-rounded w-md waves-effect waves-light m-b-5" style="width:100%;">UPDATE</button>
				<a href="{{route('boards.create')}}" class="btn btn-secondary btn-rounded w-md waves-effect waves-light m-b-5" style="width:100%;">ADD NEW</a>
				<a href="{{route('boards.index')}}" class="btn btn-primary btn-rounded w-md waves-effect waves-light m-b-5" style="width:100%;">BACK</a>
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