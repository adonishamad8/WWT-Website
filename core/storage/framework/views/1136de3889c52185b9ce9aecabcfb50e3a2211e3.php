	<?php $__env->startSection('content'); ?>
	<?php if(session()->has('message')): ?>
		<div class="alert alert-success">
			<?php echo e(session()->get('message')); ?>

		</div>
	<?php endif; ?>
	<?php if($errors->all()): ?>
		<div class="alert alert-danger">
			<ul>
			<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<li><?php echo e($error); ?></li>			
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</ul>
		</div>
	<?php endif; ?>
    <form id="form" class="form-horizontal" action="<?php echo e(route('blogs.update', $blog->id)); ?>" method="POST" enctype="multipart/form-data" data-parsley-validate novalidate>
		<?php echo method_field('put'); ?>
		<?php echo csrf_field(); ?>
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
										<input type="text" name="name" class="form-control" value="<?php echo e($blog->name); ?>" id="titleEn" placeholder="Title">
									 </div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-1"></div>
						<label for="image" class="col-sm-2 col-form-label">Image (1200x800px)</label>
						<div class="col-md-9">
							<?php if($blog->getFirstMediaUrl('blog')): ?>
							<div class="col-md-3 gallery-pages">
								<div class="thumbnail">
									<div class="caption" style="display: none;">
										<h4>Image</h4>
										<p>
										   <a href="<?php echo e($blog->getFirstMediaUrl('blog', 'thumb-large')); ?>" data-lightbox="example-set" class="example-image-link badge badge-success">View</a>
										   <button id="remove-image" class="badge badge-danger">Remove</button>
										</p>
									</div>
									<img class="article-image" src="<?php echo e($blog->getFirstMediaUrl('blog', 'thumb')); ?>" width="100">
								</div>
							</div>
							<?php endif; ?>
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
										<textarea id="editor-en" name="description"><?php echo e($blog->description); ?></textarea>
									 </div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-1"></div>
						<label for="category" class="col-sm-2 col-form-label">Category</label>
						<div class="col-sm-8">
							<input type="text" name="category" class="form-control" value="<?php echo e($blog->category); ?>" id="category" placeholder="Category">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-1"></div>
						<label for="location" class="col-sm-2 col-form-label">Location</label>
						<div class="col-sm-8">
							<input type="text" name="location" class="form-control" value="<?php echo e($blog->location); ?>" id="location" placeholder="Location">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-1"></div>
						<label for="date" class="col-sm-2 col-form-label">Date</label>
						<div class="col-sm-8">
							<input type="date" name="date" class="form-control" value="<?php echo e($blog->date); ?>" id="date" placeholder="Date">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-1"></div>
						<label for="is_video" class="col-sm-2 col-form-label">Is Video</label>
						<div class="col-sm-1">
							<div class="checkbox checkbox-primary edit-checkbox">
								<input type="checkbox" name="is_video" class="form-control" id="is_video" value="1" <?php echo e(($blog->is_video=="1")? "checked" : ""); ?>>
								<label for="is_video"></label>
							</div>
						</div>
					</div>
					<div class="form-group row <?php echo e(($blog->is_video=="1")? "" : "d-none"); ?>" id="video_cat_div">
						<div class="col-md-1"></div>
						<label for="icon" class="col-sm-2 col-form-label">Video Link</label>
						<div class="col-sm-8">
							<input type="text" name="video_link" class="form-control" value="<?php echo e($blog->video_link); ?>" id="video_link" placeholder="Video Link">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-1"></div>
						<label for="tags" class="col-sm-2 col-form-label">SEO Keywords</label>
						<div class="col-sm-8">
							<input type="text" name="tag_list" value="<?php echo e($blog->tag_list); ?>" data-role="tagsinput" placeholder="Add Keywords"/>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-1"></div>
						<label for="published" class="col-sm-2 col-form-label">Published</label>
						<div class="col-sm-1">
							<label class="switch">
								<input type="checkbox" name="published" class="form-control" id="published" value="1" <?php echo e(($blog->published=="1")? "checked" : ""); ?>>
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
				<a href="<?php echo e(route('blogs.create')); ?>" class="btn btn-secondary btn-rounded w-md waves-effect waves-light m-b-5" style="width:100%;">ADD NEW</a>
				<a href="<?php echo e(route('blogs.index')); ?>" class="btn btn-primary btn-rounded w-md waves-effect waves-light m-b-5" style="width:100%;">BACK</a>
			   </div>
			</div>
		</div>
	</form>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
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
    url: '<?php echo e(route('blogs.storeMedia')); ?>',
    maxFilesize: 2, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
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
      <?php if(isset($blog) && $blog->getMedia('gallery')): ?>
      	<?php $__currentLoopData = $blog->getMedia('gallery'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $media): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      		var file =<?php echo json_encode($media); ?>;
      		var thumbnailUrl = "<?php echo url($media->getUrl('thumb-medium')); ?>";
      		this.options.addedfile.call(this, file);
      		this.options.thumbnail.call(this, file, thumbnailUrl);
          	file.previewElement.classList.add('dz-complete');
          	$('form').append('<input type="hidden" name="gallery_image[]" value="' + file.file_name + '">');
      	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <?php endif; ?>
    }
  }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.cmslayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u133514729/domains/worldwidetravel-lb.com/public_html/core/resources/views/admin/blogs/edit.blade.php ENDPATH**/ ?>