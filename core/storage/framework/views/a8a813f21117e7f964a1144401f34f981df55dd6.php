<?php $__env->startSection('title'); ?><?php echo $service->name; ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('description', ''); ?>
<?php $__env->startSection('keywords', ''); ?>
<?php $__env->startSection('content'); ?>
      <section class="breadcrumb-outer text-center">
         <div class="container">
            <div class="breadcrumb-content">
               <h2 class="white">Services</h2>
               <nav aria-label="breadcrumb">
                  <ul class="breadcrumb">
                     <li class="breadcrumb-item"><a href="/">Home</a></li>
                     <li class="breadcrumb-item active" aria-current="page">Services</li>
                  </ul>
               </nav>
            </div>
         </div>
         <!--<div class="overlay"></div>-->
      </section>
      <section class="faq">
         <div class="container">
            <div class="row flex-row-reverse">
               <div class="col-lg-9 col-12">
                  <div class="detail-content">
                     <div class="detail-image mar-bottom-15">
                        <img src="<?php echo e($service->getFirstMediaUrl('service', 'thumb-large')); ?>" alt="<?php echo $service->name; ?>" />
                     </div>
                     <div class="title mar-bottom-15">
                        <h2><?php echo $service->name; ?></h2>
                     </div>
                     <div class="detail-desc">
                        <p><?php echo $service->description; ?></p>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-12">
                  <div class="faq-sidebar">
                     <div class="sidebar-item">
                        <h3 class="mar-bottom-30">All Services</h3>
                        <ul class="sidebar-category">
						<?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $serv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <li class="<?php echo e(route('front.service.show', [$serv->id, $serv->slug]) == url()->current() ? 'active' : ''); ?>"><a href="<?php echo e(route('front.service.show', [$serv->id, $serv->slug])); ?>"><i class="fas fa-chevron-right"></i> <?php echo $serv->name; ?></a></li>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u133514729/domains/worldwidetravel-lb.com/public_html/core/resources/views/front/service-details.blade.php ENDPATH**/ ?>