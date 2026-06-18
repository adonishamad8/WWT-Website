<?php $__env->startSection('title', 'Events'); ?>
<?php $__env->startSection('description', ''); ?>
<?php $__env->startSection('keywords', ''); ?>
<?php $__env->startSection('content'); ?>
		<section class="breadcrumb-outer text-center">
         <div class="container">
            <div class="breadcrumb-content">
               <h2 class="white">Events</h2>
               <nav aria-label="breadcrumb">
                  <ul class="breadcrumb">
                     <li class="breadcrumb-item"><a href="/">Home</a></li>
                     <li class="breadcrumb-item active" aria-current="page">Events</li>
                  </ul>
               </nav>
            </div>
         </div>
          <!--<div class="overlay"></div>-->
		</section>
		<section class="blogmain">
			<div class="container">
				<div class="row justify-content-md-center">
					<div class="col-md-10">
						<div class="blog-list">
						<?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div class="row mar-bottom-50">
								 <div class="col-lg-5 col-md-5 col-12 blog-height">
									<a href="<?php echo e(route('front.blog.show', [$blog->id, $blog->slug])); ?>">
										<div class="blog-image">
										<img src="<?php echo e($blog->getFirstMediaUrl('blog', 'thumb-large')); ?>" width="100%" alt="<?php echo $blog->name; ?>">
										   <!--<a href="<?php echo e(route('front.blog.show', [$blog->id, $blog->slug])); ?>" style="background-image: url(<?php echo e($blog->getFirstMediaUrl('blog', 'thumb-large')); ?>)"></a>
										   <div class="b-date">
											  <a href="<?php echo e(route('front.blog.show', [$blog->id, $blog->slug])); ?>" class="white"><strong><?php echo e(Carbon\Carbon::parse($blog->date)->format('d')); ?></strong> <?php echo e(Carbon\Carbon::parse($blog->date)->format('M, Y')); ?></a>
										   </div>-->
										</div>
									</a>
								 </div>
								 <div class="col-lg-7 col-md-7 col-12">
									<a href="<?php echo e(route('front.blog.show', [$blog->id, $blog->slug])); ?>">
										<div class="blog-content">
										   <h3 class="blog-title"><?php echo $blog->name; ?></h3>
										   <p><?php echo $blog->ShortDescription; ?></p>
										   <div class="para-content">
											  <!--<span class="mar-right-20"><a href="#" class="tag"><i class="far fa-calendar-alt"></i> <?php echo e(Carbon\Carbon::parse($blog->date)->format('d M, Y')); ?></a></span>-->
											  <a href="#" class="tag"><i class="fa fa-tag mar-right-5"></i><?php echo $blog->category; ?> </a>&nbsp;&nbsp;
											  <span class="mar-right-20"><a href="#"><i class="fas fa-map-marker-alt"></i> <?php echo $blog->location; ?></a></span>
										   </div>
										</div>
									</a>
								 </div>
							</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</div>
					</div>
				</div>
			</div>
		</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u133514729/domains/worldwidetravel-lb.com/public_html/core/resources/views/front/blogs.blade.php ENDPATH**/ ?>