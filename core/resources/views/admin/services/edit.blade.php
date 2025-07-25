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
    <form id="form" class="form-horizontal" action="{{route('services.update', $service->id)}}" method="POST" enctype="multipart/form-data" data-parsley-validate novalidate>
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
										<input type="text" name="name" class="form-control" value="{{$service->name}}" id="titleEn" placeholder="Title">
									 </div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-1"></div>
						<label for="image" class="col-sm-2 col-form-label">Image (1200x800px)</label>
						<div class="col-md-9">
							@if($service->getFirstMediaUrl('service'))
							<div class="col-md-3 gallery-pages">
								<div class="thumbnail">
									<div class="caption" style="display: none;">
										<h4>Image</h4>
										<p>
										   <a href="{{$service->getFirstMediaUrl('service', 'thumb-large')}}" data-lightbox="example-set" class="example-image-link badge badge-success">View</a>
										   <button id="remove-image" class="badge badge-danger">Remove</button>
										</p>
									</div>
									<img class="article-image" src="{{$service->getFirstMediaUrl('service', 'thumb')}}" width="100">
								</div>
							</div>
							@endif
							<input type="file" name="image" class="form-control input-medium">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-1"></div>
						<label for="imageThumb" class="col-sm-2 col-form-label">Icon (500x500px)</label>
						<div class="col-md-9">
							@if($service->getFirstMediaUrl('serviceThumb'))
							<div class="col-md-3 gallery-pages">
								<div class="thumbnail">
									<div class="caption" style="display: none;">
										<h4>Thumbnail</h4>
										<p>
										   <a href="{{$service->getFirstMediaUrl('serviceThumb')}}" data-lightbox="example-set" class="example-image-link badge badge-success">View</a>
										   <button id="remove-image-thumb" class="badge badge-danger">Remove</button>
										</p>
									</div>
									<img class="article-image" src="{{$service->getFirstMediaUrl('serviceThumb', 'thumb')}}" width="100">
								</div>
							</div>
							@endif
							<input type="file" name="imageThumb" class="form-control input-medium">
						</div>
					</div>
					<div class="row translate-bg">
						<div class="col-sm-12">
							<div class="tab-content">
								<div class="form-group row">
									<div class="col-md-1"></div>
									 <label for="DescEn" class="col-sm-2 col-form-label">Description</label>
									 <div class="col-sm-8">
										<textarea id="editor-en" name="description">{{$service->description}}</textarea>
									 </div>
								</div>
							</div>
						</div>
					</div>
					<!--<div class="form-group row">
						<div class="col-md-1"></div>
						<label for="icon" class="col-sm-2 col-form-label">Icon</label>
						<div class="col-sm-8">
							<input type="text" name="icon" class="form-control" value="{{$service->icon}}" id="icon" placeholder="Icon">
						</div>
					</div>-->
					<div class="form-group row">
						<div class="col-md-1"></div>
						<label for="link" class="col-sm-2 col-form-label">Link</label>
						<div class="col-sm-8">
							<input type="text" name="link" class="form-control" value="{{$service->link}}" id="link" placeholder="Link">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-1"></div>
						<label for="order" class="col-sm-2 col-form-label">Order</label>
						<div class="col-sm-8">
							<input type="number" name="order" class="form-control" value="{{$service->order}}" id="order" placeholder="Order">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-1"></div>
						<label for="published" class="col-sm-2 col-form-label">Published</label>
						<div class="col-sm-1">
							<label class="switch">
								<input type="checkbox" name="published" class="form-control" id="published" value="1" {{ ($service->published=="1")? "checked" : "" }}>
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
				<a href="{{route('services.create')}}" class="btn btn-secondary btn-rounded w-md waves-effect waves-light m-b-5" style="width:100%;">ADD NEW</a>
				<a href="{{route('services.index')}}" class="btn btn-primary btn-rounded w-md waves-effect waves-light m-b-5" style="width:100%;">BACK</a>
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
		$("#remove-image-thumb").click(function(event){
            if (confirm('Are you sure you want to delete?')) {
                var input = $("<input>")
                .attr("type", "hidden")
                .attr("name", "delete_existing_image_thumb")
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