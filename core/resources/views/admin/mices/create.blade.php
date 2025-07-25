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
	<form class="form-horizontal" action="{{route('mices.store')}}" method="POST" enctype="multipart/form-data" data-parsley-validate novalidate>
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
						<label for="image" class="col-sm-2 col-form-label">Image (1200x800px)</label>
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
						<label for="is_video" class="col-sm-2 col-form-label">Is Video</label>
						<div class="col-sm-1">
							<div class="checkbox checkbox-primary">
								<input id="is_video" type="checkbox" name="is_video" value="1">
								<label for="is_video"></label>
							</div>
						</div>
					</div>
				  	<div class="form-group row d-none" id="video_cat_div">
						<div class="col-md-1"></div>
						<label for="video_link" class="col-sm-2 col-form-label">Video Link</label>
						<div class="col-sm-8">
							<input type="text" name="video_link" class="form-control" id="video_link" placeholder="Video Link">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-1"></div>
						<label for="link" class="col-sm-2 col-form-label">Link</label>
						<div class="col-sm-8">
							<input type="text" name="link" class="form-control" id="link" placeholder="Link">
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
				  <button type="submit" class="btn btn-success btn-rounded w-md waves-effect waves-light m-b-5" style="width:100%;">SAVE</button>
				  <a href="{{route('mices.index')}}" class="btn btn-primary btn-rounded w-md waves-effect waves-light m-b-5" style="width:100%;">BACK</a>
			   </div>
			</div>
		</div>
	</form>
@endsection
@section('scripts')
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
    }
  }
</script>
@endsection