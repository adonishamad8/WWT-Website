<?php $__env->startSection('title'); ?><?php echo $category->name; ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('description', ''); ?>
<?php $__env->startSection('keywords', ''); ?>
<?php $__env->startSection('content'); ?>
      <section class="breadcrumb-outer text-center">
         <div class="container">
            <div class="breadcrumb-content">
               <h2 class="white"><?php echo $category->name; ?></h2>
               <nav aria-label="breadcrumb">
                  <ul class="breadcrumb">
                     <li class="breadcrumb-item"><a href="/">Home</a></li>
                     <li class="breadcrumb-item active" aria-current="page"><?php echo $category->name; ?></li>
                  </ul>
               </nav>
            </div>
         </div>
          <!--<div class="overlay"></div>-->
      </section>
      <section class="list">
         <div class="container">
            <div class="row">
               <div class="col-lg-12 col-12">
                  <div class="trend-box">
                     <div class="row">
					<?php $__currentLoopData = $category->packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if($package->published == 1): ?>
                        <div class="col-lg-4 col-md-4 col-12 mar-bottom-30">
                           <div class="trend-item">
						   <a href="<?php echo e(route('front.package.show', [$package->id, $package->slug])); ?>">
                              <div class="trend-image">
                                 <img src="<?php echo e($package->getFirstMediaUrl('package', 'thumb-medium')); ?>" width="100%" alt="<?php echo $package->name; ?>" />
								<?php if($package->price != NULL || $package->price != ''): ?>
                                 <div class="trend-price">
                                    <p class="price"><span><?php echo $package->price; ?></span> / Pers </p>
                                 </div>
								<?php endif; ?>
                              </div>
							</a>
                              <div class="trend-content">
                                 <p><i class="fas fa-map-marker-alt"></i> <?php echo $package->country; ?>  <?php if($package->date != NULL || $package->date != ''): ?><span class="duration-night"><i class="fas fa-clock"></i> <?php echo $package->date; ?></span><?php endif; ?></p>
                                 <h4><a href="<?php echo e(route('front.package.show', [$package->id, $package->slug])); ?>"><?php echo $package->name; ?></a></h4>
                              </div>
                           </div>
                        </div>
						<?php endif; ?>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <!--<div class="col-12">
                           <div class="blog-button text-center">
                              <a href="#" class="wt-btn wt-btn1">Load More</a>
                           </div>
                        </div>-->
                     </div>
                  </div>
               </div>
              
            </div>
         </div>
      </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u133514729/domains/worldwidetravel-lb.com/public_html/core/resources/views/front/packages.blade.php ENDPATH**/ ?>