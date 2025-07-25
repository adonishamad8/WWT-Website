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
    <form id="form" class="form-horizontal" action="{{route('mices.update', $mice->id)}}" method="POST" enctype="multipart/form-data" data-parsley-validate novalidate>
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
										<input type="text" name="name" class="form-control" value="{{$mice->name}}" id="titleEn" placeholder="Title">
									 </div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-1"></div>
						<label for="image" class="col-sm-2 col-form-label">Image (1200x800px)</label>
						<div class="col-md-9">
							@if($mice->getFirstMediaUrl('mice'))
							<div class="col-md-3 gallery-pages">
								<div class="thumbnail">
									<div class="caption" style="display: none;">
										<h4>Image</h4>
										<p>
										   <a href="{{$mice->getFirstMediaUrl('mice', 'thumb-large')}}" data-lightbox="example-set" class="example-image-link badge badge-success">View</a>
										   <button id="remove-image" class="badge badge-danger">Remove</button>
										</p>
									</div>
									<img class="article-image" src="{{$mice->getFirstMediaUrl('mice', 'thumb')}}" width="100">
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
										<textarea id="editor-en" name="description">{{$mice->description}}</textarea>
									 </div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-1"></div>
						<label for="is_video" class="col-sm-2 col-form-label">Is Video</label>
						<div class="col-sm-1">
							<div class="checkbox checkbox-primary edit-checkbox">
								<input type="checkbox" name="is_video" class="form-control" id="is_video" value="1" {{ ($mice->is_video=="1")? "checked" : "" }}>
								<label for="is_video"></label>
							</div>
						</div>
					</div>
					<div class="form-group row {{($mice->is_video=="1")? "" : "d-none" }}" id="video_cat_div">
						<div class="col-md-1"></div>
						<label for="video_link" class="col-sm-2 col-form-label">Video Link</label>
						<div class="col-sm-8">
							<input type="text" name="video_link" class="form-control" value="{{$mice->video_link}}" id="video_link" placeholder="Video Link">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-1"></div>
						<label for="link" class="col-sm-2 col-form-label">Link</label>
						<div class="col-sm-8">
							<input type="text" name="link" class="form-control" value="{{$mice->link}}" id="link" placeholder="Link">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-1"></div>
						<label for="published" class="col-sm-2 col-form-label">Published</label>
						<div class="col-sm-1">
							<label class="switch">
								<input type="checkbox" name="published" class="form-control" id="published" value="1" {{ ($mice->published=="1")? "checked" : "" }}>
								<span class="slider round"></span>
							</label>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-1"></div>
				        <label for="gallery" class="col-sm-2 col-form-label">Photo Gallery</label>
						<div class="col-sm-8">
							<div class="needsclick dropzone" id="gallery-dropzone"></div>
						</div>
				    </div>
			   </div>
			</div>
			<div class="col-xl-4">
			   <div class="card-box">
				<h4 class="header-title m-t-0 m-b-30">Action</h4>
				<button type="submit" class="btn btn-success btn-rounded w-md waves-effect waves-light m-b-5" style="width:100%;">UPDATE</button>
				<a href="{{route('mices.create')}}" class="btn btn-secondary btn-rounded w-md waves-effect waves-light m-b-5" style="width:100%;">ADD NEW</a>
				<a href="{{route('mices.index')}}" class="btn btn-primary btn-rounded w-md waves-effect waves-light m-b-5" style="width:100%;">BACK</a>
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
	$(document).ready(function(){
		$('#is_video').change(function(){
			var is_checked=$('#is_video').prop('checked');
			// alert(is_checked);
			if(is_checked){
				$('#video_cat_div').removeClass('d-none');
				$('#video_cat_div').val('');
				$('#video_link').prop('required', true);
			}
			else{
				$('#video_cat_div').addClass('d-none');
				$('#video_link').prop('required', false);
			}
		});
	});
</script>
<script>
  var uploadedGalleryMap = {}
  Dropzone.options.galleryDropzone = {
    url: '{{ route('mices.storeMedia') }}',
    maxFilesize: 2, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="gallery_image[]" value="' + response.name + '">')
      uploadedGalleryMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedGalleryMap[file.name]
      }
      $('form').find('input[name="gallery_image[]"][value="' + name + '"]').remove()
    },
    init: function () {
      @if(isset($mice) && $mice->getMedia('gallery'))
      	@foreach($mice->getMedia('gallery') as $media)
      		var file ={!! json_encode($media) !!};
      		var thumbnailUrl = "{!! url($media->getUrl('thumb-medium')) !!}";
      		this.options.addedfile.call(this, file);
      		this.options.thumbnail.call(this, file, thumbnailUrl);
          	file.previewElement.classList.add('dz-complete');
          	$('form').append('<input type="hidden" name="gallery_image[]" value="' + file.file_name + '">');
      	@endforeach
      @endif
    }
  }
</script>
@endsection