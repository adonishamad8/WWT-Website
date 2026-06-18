	<?php $__env->startSection('content'); ?>
	<div class="row">
		<div class="col-12">
			<div class="card-box table-responsive">
				<h4 class="m-t-0 header-title">Packages</h4>
				<br>
				<?php if(session()->has('message')): ?>
					<div class="alert alert-success">
						<?php echo e(session()->get('message')); ?>

					</div>
				<?php endif; ?>
				<table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
					<thead>
					<tr>
						<th>Image</th>
						<th>Title</th>
						<th>Category</th>
						<th>Published</th>
						<th>Action</th>
					</tr>
					</thead>
					<tbody>
					<?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td><img class="img-circle" src="<?php echo e($package->getFirstMediaUrl('package', 'thumb')); ?>" width="50"></td>
						<td><?php echo e($package->name); ?></td>
						<td>
						<?php $__currentLoopData = $package->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<span><?php echo e($category->name); ?></span> &nbsp; 
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</td>
						<td><?php echo $package->published == 1 ? '<span class="badge badge-success">published</span>' : '<span class="badge badge-warning">unpublished</span>'; ?></td>
						<td><a href="<?php echo e(route('packages.edit', $package->id)); ?>" class="btn btn-info btn-xs webtn">Edit</a> 
						<form onsubmit="return confirm('Are you sure you want to delete?');" class="d-inline-block" method="post" action="<?php echo e(route('packages.destroy', $package->id)); ?>">
						<?php echo csrf_field(); ?>
							<?php echo method_field('delete'); ?>
							<button type="submit" class="btn btn-danger btn-xs webtn">Delete</button>
						</form>
						</td>
					</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tbody>
				</table>
				<hr>
				<a href="<?php echo e(route('packages.create')); ?>" class="btn btn-success btn-rounded w-md waves-effect waves-light m-b-5">Add New</a>
			</div>
		</div>
	</div>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.cmslayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u133514729/domains/worldwidetravel-lb.com/public_html/core/resources/views/admin/packages/index.blade.php ENDPATH**/ ?>