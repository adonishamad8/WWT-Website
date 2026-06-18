<?php $__env->startSection('title'); ?><?php echo $blog->name; ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('description', ''); ?>
<?php $__env->startSection('keywords', ''); ?>

<?php $__env->startSection('schema'); ?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "What are the best event management companies in Lebanon?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "The best event management company in Lebanon is World Wide Travel and Tourism. It offers top-tier event planning, corporate events, and luxury experiences."
      }
    },
    {
      "@type": "Question",
      "name": "Why hire an event management company in Lebanon?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "An event management company ensures seamless planning, vendor coordination, budget management, and on-site execution, making your event stress-free and successful."
      }
    },
    {
      "@type": "Question",
      "name": "How much does event planning cost in Lebanon?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Event planning costs vary based on event type, guest count, and services required. World Wide Travel and Tourism offers customized packages to fit different budgets."
      }
    }
  ]
}
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
      <section class="breadcrumb-outer text-center">
         <div class="container">
            <div class="breadcrumb-content">
               <h2 class="white"><?php echo $blog->name; ?></h2>
               <nav aria-label="breadcrumb">
                  <ul class="breadcrumb">
                     <li class="breadcrumb-item"><a href="/">Home</a></li>
                     <li class="breadcrumb-item"><a href="<?php echo route('front.blogs'); ?>">Events</a></li>
                     <li class="breadcrumb-item active" aria-current="page"><?php echo $blog->name; ?></li>
                  </ul>
               </nav>
            </div>
         </div>
      </section>
      <section class="blogmain blog-fullwidth">
         <div class="container">
            <div class="row">
               <div class="col-lg-10 offset-lg-1">
                  <div class="blog-single">
					<div class="gallery detail-box about-slider">
                        <div class="gallery-item">
							<img src="<?php echo e($blog->getFirstMediaUrl('blog', 'thumb-large')); ?>" width ="100%" alt="<?php echo $blog->name; ?>"/>
                        </div>
						<?php if($blog->is_video == 1): ?>
						<div class="gallery-item">
							<iframe width="100%" height="315" src="https://www.youtube.com/embed/<?php echo $blog->video_link; ?>"></iframe>
						</div>
						<?php endif; ?>
						<?php $__currentLoopData = $blog->getMedia('gallery'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $media): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="gallery-item">
							<img src="<?php echo url($media->getUrl()); ?>" width="100%" alt="<?php echo $blog->name; ?>"/>
						</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </div>
                     <div class="blog-content mar-bottom-30">
                        <h3 class="blog-title"><?php echo $blog->name; ?></h3>
                        <div class="para-content pad-bottom-20">
                            <!--<span class="mar-right-20"><a class="tag"><i class="far fa-calendar-alt"></i> &nbsp;<?php echo e(Carbon\Carbon::parse($blog->date)->format('d M, Y')); ?></a></span>-->
                            <a class="tag"><i class="fa fa-tag mar-right-5"></i> <?php echo $blog->category; ?></a>&nbsp;&nbsp;
                            <span class="mar-right-20"><a class="tag"><i class="fas fa-map-marker-alt"></i> <?php echo $blog->location; ?></a></span>
                        </div>
                        <p><?php echo $blog->description; ?></p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u133514729/domains/worldwidetravel-lb.com/public_html/core/resources/views/front/blog-details.blade.php ENDPATH**/ ?>