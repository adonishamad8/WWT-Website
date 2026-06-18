<?php $__env->startSection('title', 'News & Events'); ?>
<?php $__env->startSection('description', ''); ?>
<?php $__env->startSection('keywords', ''); ?>
<?php $__env->startSection('content'); ?>
<section class="breadcrumb-outer text-center">
   <div class="container">
      <div class="breadcrumb-content">
         <h2 class="white">News & Events</h2>
         <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
               <li class="breadcrumb-item"><a href="/">Home</a></li>
               <li class="breadcrumb-item active" aria-current="page">News & Events</li>
            </ul>
         </nav>
      </div>
   </div>
   <!--<div class="overlay"></div>-->
</section>

<section class="blog">
   <div class="container">
      <div class="row">
         <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <?php if(!in_array($event->id, [35, 43])): ?>  
               <div class="<?php echo e($loop->index < 2 ? 'col-lg-6 col-sm-6' : 'col-lg-4 col-sm-12'); ?> col-12 mar-bottom-30">
                  <div class="grid">
                     <div class="grid-item">
                        <div class="grid-image">
                           <img src="<?php echo e($event->getFirstMediaUrl('event', 'thumb-medium')); ?>" width="100%" alt="<?php echo e($event->name); ?>"/>
                        </div>
                        <div class="gridblog-content">
                           <div class="date mar-bottom-15">
                              <i class="far fa-calendar-alt"></i> <?php echo e(\Carbon\Carbon::parse($event->date)->format('d M, Y')); ?>

                           </div>
                           <h3><a href="<?php echo e(route('front.event.show', [$event->id, $event->slug])); ?>"><?php echo e($event->name); ?></a></h3>
                           <a href="<?php echo e(route('front.event.show', [$event->id, $event->slug])); ?>" class="wt-btn wt-btn1">Read More</a>
                        </div>
                     </div>
                  </div>
               </div>
            <?php endif; ?>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
   </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u133514729/domains/worldwidetravel-lb.com/public_html/core/resources/views/front/events.blade.php ENDPATH**/ ?>