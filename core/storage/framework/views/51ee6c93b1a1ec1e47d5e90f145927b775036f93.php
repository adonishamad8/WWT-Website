<?php $__env->startSection('title'); ?><?php echo $event->name; ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('description', ''); ?>
<?php $__env->startSection('keywords', ''); ?>
<?php $__env->startSection('content'); ?>
      <section class="breadcrumb-outer text-center">
         <div class="container">
            <div class="breadcrumb-content">
               <h2 class="white"><?php echo $event->name; ?></h2>
               <nav aria-label="breadcrumb">
                  <ul class="breadcrumb">
                     <li class="breadcrumb-item"><a href="/">Home</a></li>
                     <li class="breadcrumb-item"><a href="<?php echo route('front.events'); ?>">News & Events</a></li>
                     <li class="breadcrumb-item active" aria-current="page"><?php echo $event->name; ?></li>
                  </ul>
               </nav>
            </div>
         </div>
          <!--<div class="overlay"></div>-->
      </section>
      <section class="blogmain blog-fullwidth">
         <div class="container">
            <div class="row">
               <div class="col-lg-10 offset-lg-1">
                  <div class="blog-single">
					<div class="gallery detail-box about-slider">
                        <div class="gallery-item">
							<img src="<?php echo e($event->getFirstMediaUrl('event', 'thumb-medium')); ?>" width ="100%" alt="<?php echo $event->name; ?>"/>
                        </div>
						<?php if($event->is_video == 1): ?>
						<div class="gallery-item">
							<iframe width="100%" height="315" src="https://www.youtube.com/embed/<?php echo $event->video_link; ?>"></iframe>
						</div>
						<?php endif; ?>
						<?php $__currentLoopData = $event->getMedia('gallery'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $media): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="gallery-item">
							<img src="<?php echo url($media->getUrl()); ?>" width="100%" alt="<?php echo $event->name; ?>"/>
						</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </div>
                     <div class="blog-content mar-bottom-30">
                        <h3 class="blog-title"><?php echo $event->name; ?></h3>
                        <div class="para-content pad-bottom-20">
                            <span class="mar-right-20"><a class="tag"><i class="far fa-calendar-alt"></i> &nbsp;<?php echo e(Carbon\Carbon::parse($event->date)->format('d M, Y')); ?></a></span>
                            <span class="mar-right-20"><a class="tag"><i class="fa fa-tag mar-right-5"></i> <?php echo $event->category; ?></a></span>
							<?php if($event->link != NULL || $event->link != ''): ?>
                            <span class="mar-right-20"><a target="_Blank" href="<?php echo $event->link; ?>" class="tag"><i class="fa fa-link"></i> Source Link</a></span>
							<?php endif; ?>
                        </div>
                        <p><?php echo $event->description; ?></p>
                     </div>
                    <!-- <div class="blog-next mar-bottom-30">
                        <a href="#" class="pull-left">
                           <div class="prev">
                              <i class="fas fa-long-arrow-left white"></i>
                              <p class="white">Previous Post</p>
                              <p class="white">Blog Title 1</p>
                           </div>
                        </a>
                        <a href="#" class="pull-right">
							<div class="next">
								<i class="fas fa-long-arrow-right white"></i>
								<p class="white">Previous Post</p>
								<p class="white">Blog Title 2</p>
							</div>
                        </a>
                     </div>-->
                  </div>
               </div>
            </div>
         </div>
      </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u133514729/domains/worldwidetravel-lb.com/public_html/core/resources/views/front/event-details.blade.php ENDPATH**/ ?>