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
    <form class="form-horizontal" action="<?php echo e(route('abouts.update', $about->id)); ?>" method="POST" enctype="multipart/form-data" data-parsley-validate novalidate>
		<?php echo method_field('put'); ?>
		<?php echo csrf_field(); ?>
		<div class="row">
			<div class="col-xl-8">
				<div class="card-box">
					<h4 class="header-title m-t-0 m-b-30">Edit Content</h4>
					<div class="form-group row">
						<div class="col-md-1"></div>
						<label class="col-2 col-form-label">Type</label>
						<div class="col-8">
							<select class="form-control" name="type">
								<option disabled selected hidden>-- Select Type --</option>
								<option value="about" <?php echo e(old("type", $about->type) == "about" ? "selected" : ""); ?>>About</option>
								<option value="mission" <?php echo e(old("type", $about->type) == "mission" ? "selected" : ""); ?>>Mission</option>
								<option value="vision" <?php echo e(old("type", $about->type) == "vision" ? "selected" : ""); ?>>Vision</option>
								<option value="values" <?php echo e(old("type", $about->type) == "values" ? "selected" : ""); ?>>Values</option>
								<option value="other" <?php echo e(old("type", $about->type) == "other" ? "selected" : ""); ?>>Other</option>
							</select>
						</div>
					</div>
					<div class="row translate-bg">
						<div class="col-sm-12">
							<div class="tab-content">
								<div class="form-group row">
									<div class="col-md-1"></div>
									 <label for="titleEn" class="col-sm-2 col-form-label">Title</label>
									 <div class="col-sm-8">
										<input type="text" name="name" class="form-control" value="<?php echo e($about->name); ?>" id="titleEn" placeholder="Title">
									 </div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-1"></div>
						<label for="image" class="col-sm-2 col-form-label">Image (1200x800px)</label>
						<div class="col-md-9">
							<?php if($about->getFirstMediaUrl('about')): ?>
							<div class="col-md-3 gallery-pages">
								<div class="thumbnail">
									<div class="caption" style="display: none;">
										<h4>Image</h4>
										<p>
										   <a href="<?php echo e($about->getFirstMediaUrl('about', 'thumb-large')); ?>" data-lightbox="example-set" class="example-image-link badge badge-success">View</a>
										   <button id="remove-image" class="badge badge-danger">Remove</button>
										</p>
									</div>
									<img class="article-image" src="<?php echo e($about->getFirstMediaUrl('about', 'thumb')); ?>" width="100">
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
										<textarea id="editor-en" name="description"><?php echo e($about->description); ?></textarea>
									 </div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-1"></div>
						<label for="link" class="col-sm-2 col-form-label">Link</label>
						<div class="col-sm-8">
							<input type="text" name="link" class="form-control" value="<?php echo e($about->link); ?>" id="link" placeholder="Link">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-1"></div>
						<label for="published" class="col-sm-2 col-form-label">Published</label>
						<div class="col-sm-1">
							<label class="switch">
								<input type="checkbox" name="published" class="form-control" id="published" value="1" <?php echo e(($about->published=="1")? "checked" : ""); ?>>
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
				<a href="<?php echo e(route('abouts.create')); ?>" class="btn btn-secondary btn-rounded w-md waves-effect waves-light m-b-5" style="width:100%;">ADD NEW</a>
				<a href="<?php echo e(route('abouts.index')); ?>" class="btn btn-primary btn-rounded w-md waves-effect waves-light m-b-5" style="width:100%;">BACK</a>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.cmslayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u133514729/domains/worldwidetravel-lb.com/public_html/core/resources/views/admin/abouts/edit.blade.php ENDPATH**/ ?>