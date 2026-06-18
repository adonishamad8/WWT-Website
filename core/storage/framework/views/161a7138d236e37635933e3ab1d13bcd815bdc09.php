<?php $__env->startSection('title', 'Home'); ?>
<?php $__env->startSection('description', ''); ?>
<?php $__env->startSection('keywords', ''); ?>
<?php $__env->startSection('content'); ?>


<!-- ===== HERO SLIDER SECTION START ===== -->
<section class="banner">
   <div class="slider">
      <div class="swiper-container">
         <div class="swiper-wrapper">
            <?php
                $ctaLinks = [
                  'https://worldwidetravel-lb.com/contact',             // Slide 1
                  'https://worldwidetravel-lb.com/contact',      // Slide 2
                  'https://worldwidetravel-lb.com/contact',           // Slide 3
                  'https://worldwidetravel-lb.com/contact',           // Slide 4
                ];
                $ctaTitle = 'Contact Us';
            ?>

  <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 <div class="swiper-slide">
    <div class="slide-inner" style="position: relative;">
       <div class="slide-image" style="background-image: url(<?php echo e($slider->getFirstMediaUrl('slider', 'thumb-large')); ?>); background-size: cover; background-position: center; width: 100vw; height: 100vh; min-height: 600px;"></div>
       <div class="swiper-content"
            style="position: absolute; top: 50%; left: 0; right: 0; transform: translateY(-50%); z-index:2; text-align:left;">
          <div class="container">
              <span class="slider-subtitle" style="color:white"><?php echo $slider->description; ?></span>
              <h1 class="slider-title"><?php echo $slider->name; ?></h1>
              <p class="mar-bottom-30" style="color:#fff; font-size:22px; text-shadow:0 3px 20px rgba(0,0,0,0.7);"></p>
              <?php if(isset($ctaLinks[$key])): ?>
                <a href="<?php echo e($ctaLinks[$key]); ?>" class="wt-btn" style="margin-top:30px; font-size:18px; padding:14px 38px;">
                  <?php echo e($ctaTitle); ?>

                </a>
              <?php endif; ?>
          </div>
      </div>
       <div class="overlay" style="position:absolute; top:0; left:0; width:100%; height:100%;  z-index:1;"></div>
    </div>
 </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

         </div>
         <div class="swiper-button-next"></div>
         <div class="swiper-button-prev"></div>
      </div>
   </div>
   <style>
       /* ===== HERO SWIPER: plain white arrows, no background ===== */

/* 1) Swiper v8 variables (color + size) */
.banner .swiper-container{
  --swiper-navigation-color: #fff;   /* arrow color */
  --swiper-theme-color: #fff;
  --swiper-navigation-size: 42px;    /* arrow size */
}

/* 2) Strip any theme background/shape */
.banner .swiper-button-next,
.banner .swiper-button-prev{
  background: none !important;
  background-image: none !important;
  box-shadow: none !important;
  border: 0 !important;
  border-radius: 0 !important;
  width: auto !important;
  height: auto !important;
  padding: 0 !important;
  z-index: 5;                        /* above the dark overlay */
}

/* some themes add circles via ::before — remove them */
.banner .swiper-button-next::before,
.banner .swiper-button-prev::before{
  content: none !important;
  display: none !important;
}

/* 3) Draw the chevrons explicitly (Swiper icon font) */
.banner .swiper-button-next::after,
.banner .swiper-button-prev::after{
  font-family: swiper-icons !important; /* Swiper 6–10 */
  font-size: var(--swiper-navigation-size) !important;
  line-height: 1 !important;
  color: #fff !important;
  background: none !important;
  text-shadow: 0 0 8px rgba(0,0,0,.45); /* optional readability */
}

/* tell each side which glyph to use */
.banner .swiper-button-next::after{ content: 'next' !important; }
.banner .swiper-button-prev::after{ content: 'prev' !important; }

/* 4) Position tweaks */
.banner .swiper-button-prev{ left: 16px !important; top: 50%; transform: translateY(-50%); }
.banner .swiper-button-next{ right: 16px !important; top: 50%; transform: translateY(-50%); }

   </style>
</section>

<!-- ===== HERO SLIDER SECTION END ===== -->

<!-- ===== REST OF YOUR PAGE (UNCHANGED) ===== -->
<section class="why-choose-us-section" style="background: #fff; padding-top: 100px; padding-bottom: 80px;">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-3 col-md-6 col-6 mb-4 text-center">
                <div class="why-icon" >
                    <img src="https://kagensee.com/wp-content/uploads/2025/07/Untitled-design-78.png" alt="A Lot Of Discount" class="why-icon-img">
                </div>
                <h5 class="why-title">Global Partners</h5>
            </div>
            <div class="col-lg-3 col-md-6 col-6 mb-4 text-center">
                <div class="why-icon" style="">
                    <img src="https://kagensee.com/wp-content/uploads/2025/07/1-1.png" alt="Best Guide" class="why-icon-img">
                </div>
                <h5 class="why-title">Best Guide</h5>
            </div>
            <div class="col-lg-3 col-md-6 col-6 mb-4 text-center">
                <div class="why-icon">
                    <img src="https://kagensee.com/wp-content/uploads/2025/07/3-1.png" alt="24/7 Support" class="why-icon-img">
                </div>
                <h5 class="why-title">24/7 Support</h5>
            </div>
            <div class="col-lg-3 col-md-6 col-6 mb-4 text-center">
                <div class="why-icon" style="">
                    <img src="https://kagensee.com/wp-content/uploads/2025/07/2-1.png" alt="Travel Management" class="why-icon-img">
                </div>
                <h5 class="why-title">Premium Solutions</h5>
            </div>
        </div>
    </div>
</section>

<section class="destination-category-section section-padding pt-0">
 <div class="plane-shape-bounce">
    <img src="https://kagensee.com/wp-content/uploads/2025/07/shape.png" alt="Plane Shape">
</div>




<div class="container">
    <div class="section-title text-center">
        <span class="sub-title">Wonderful Place For You</span>
        <h2>Browse By Packages</h2>
    </div>
</div>
<div class="container-fluid">
    <div class="swiper category-slider">
        <div class="swiper-wrapper">
            <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="swiper-slide">
    <div class="destination-category-item">
        <!-- Image with hover overlay -->
        <a href="<?php echo e(route('front.package.show', [$package->id, $package->slug])); ?>" 
           class="category-image-link" 
           style="display:block; position:relative; overflow:hidden;">
           
            <img src="<?php echo e($package->getFirstMediaUrl('package', 'thumb-medium')); ?>" 
                 alt="<?php echo e($package->name); ?>" 
                 style="width:100%; display:block;">

            
            <?php if(!empty($package->price) || !empty($package->date)): ?>
                <div class="package-hover-info">
                    <?php if(!empty($package->price)): ?>
                        <span class="price"><?php echo e(e($package->price)); ?></span>
                    <?php endif; ?>
                    <?php if(!empty($package->date)): ?>
                        <span class="date"><?php echo e(e($package->date)); ?></span>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </a>

        <div class="category-content text-center">
            <h5 style="margin-bottom: 14px; margin-top:10px;">
                <a href="<?php echo e(route('front.package.show', [$package->id, $package->slug])); ?>" 
                   style="color:#16303b; text-decoration:none;">
                    <?php echo e($package->name); ?>

                </a>
            </h5>
            <a href="<?php echo e(route('front.package.show', [$package->id, $package->slug])); ?>" 
               class="wt-btn-black" style="margin-top:4px;">View Package</a>
        </div>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        </div>
        <div class="swiper-dot4 mt-5"></div>
    </div>
</section>

<section class="why-us pad-top-70">
   <div class="container">
      <div class="section-title">
         <h2>Our <span>Services</span></h2>
      </div>
      <div class="why-us-box">
         <div class="row">
            <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-3 col-sm-6 col-12">
                    <a href="<?php echo e(route('front.service.show', [$service->id, $service->slug])); ?>">
                        <div class="why-us-item why-us-item1 text-center">
                            <div class="why-us-icon">
                               <img src="<?php echo e($service->getFirstMediaUrl('serviceThumb')); ?>" width="100" alt="<?php echo $service->name; ?>"/>
                            </div>
                            <div class="why-us-content">
                               <h3><?php echo $service->name; ?></h3>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         </div>
      </div>
   </div>
</section>

<br><br><br><br>
<section class="news-section section-padding fix">
    <div class="container">
        <div class="section-title text-center">
            <span class="sub-title">News & Updates</span>
            <h2>Our Latest News & Articles</h2>
        </div>
<div class="row">
  <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php
      $img = $event->getFirstMediaUrl('event', 'thumb-medium');
    ?>

    <div class="col-xl-4 col-lg-6 col-md-6 d-flex mb-4">
      <article class="news-card-items flex-fill">
        
        <div class="news-image">
          <?php if(!empty($img)): ?>
            <img src="<?php echo e($img); ?>" alt="<?php echo e($event->name); ?>">
          <?php else: ?>
            
          <?php endif; ?>
        </div>

        
        <div class="news-content" style="padding:16px;">
          <ul class="post-meta" style="margin-bottom:10px;">
            <li>
              <i class="fa-regular fa-calendar-days"></i>
              <?php echo e(\Carbon\Carbon::parse($event->date)->format('F d, Y')); ?>

            </li>
            <li>
              <i class="fa-solid fa-tag"></i>
              <?php echo e($event->category ?? 'General'); ?>

            </li>
          </ul>

          <h3 style="margin-bottom:8px;">
            <a href="<?php echo e(route('front.event.show', [$event->id, $event->slug])); ?>">
              <?php echo e(\Illuminate\Support\Str::limit($event->name, 90)); ?>

            </a>
          </h3>

          <a href="<?php echo e(route('front.event.show', [$event->id, $event->slug])); ?>" class="link-btn">
            Read More <i class="fa-sharp fa-regular fa-arrow-right"></i>
          </a>
        </div>
      </article>
    </div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

    </div>
</section>

<section class="call-to-action">
   <div class="container">
      <div class="action-content text-center mar-bottom-20">
         <h3 class="white package-name">With You </h3>
         <h2 class="white mar-bottom-0">Thousands of Destinations and Beyond</h2>
      </div>
      <div class="video-button text-center">
         <div class="call-button1">
            <button type="button" class="play-btn js-video-button" data-video-id="Ty64Bdhc55E" data-channel="youtube">
                <i class="fa fa-play"></i>
            </button>
         </div>
         <div class="video-figure"></div>
      </div>
   </div>
</section>
<section class="cta-one">
   <div class="container">
      <div class="cta-one_block display-flex space-between">
         <h2 class="white mar-bottom-0">We strive to create winning solutions and exceptional experience for your events</h2>
         <a href="<?php echo route('front.contact'); ?>" class="wt-btn-white btn-width">Get in Touch</a>
      </div>
   </div>
</section>
<link rel="stylesheet" href="https://unpkg.com/swiper@9/swiper-bundle.min.css" />
<link rel="stylesheet" href="https://unpkg.com/swiper@9/swiper-bundle.min.css" />

<style>
/* Load Poppins (remove this line if you're already loading it globally) */
@import  url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

/* Make the whole feedback section use Poppins */
/* Make feedback section use Poppins but keep icons safe */
.top-review,
.top-review *:not(i.fa):not(i.fas):not(i.far):not(i.fab){
  font-family: 'Poppins', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif !important;
}



/* ===== Base styles ===== */
.review-card:hover{box-shadow:0 8px 40px 0 rgba(56,181,230,0.14);}
.swiper-button-next,.swiper-button-prev,.review-swiper-button-next,.review-swiper-button-prev{
  background:none!important;border:none!important;outline:none!important;color:#38B5E6!important;font-size:2.2rem!important;}
.review-swiper-pagination .swiper-pagination-bullet{
  background:#38B5E6!important;opacity:.3;width:12px;height:12px;margin:0 5px!important;border-radius:50%;border:2px solid #38B5E6;}
.review-swiper-pagination .swiper-pagination-bullet-active{
  opacity:1;background:#38B5E6!important;width:28px;border-radius:20px;}
/* ===== Layout & equal-height helpers ===== */
.top-review.bg-grey{padding:60px 0 40px;}
.review-swiper{overflow:visible;padding-bottom:80px;} /* extra room for nav + dots */
.review-swiper .swiper-wrapper{align-items:stretch;}
.review-swiper .swiper-slide{height:auto;}
.review-card{
  display:flex;flex-direction:column;height:100%;
  background:#fff;border-radius:14px;padding:22px;border:1px solid #eef2f4;
}
.review-text{flex:1;overflow:visible;display:block;}
.review-author{margin-top:auto;}
.review-stars{margin-bottom:12px;}
.quote-mark{line-height:1;}

/* ===== Controls: NAV on row 1, DOTS on row 2 (always below) ===== */
.review-controls{
  position:absolute;left:0;right:0;bottom:0;margin:auto;
  display:grid;grid-template-rows:auto auto;row-gap:12px; /* forces vertical order */
  place-items:center;
  width:100%;
}
.review-nav-center{
  grid-row:1; /* top row */
  display:flex;align-items:center;justify-content:center;max-width:520px;width:100%;
}
.review-nav-line{flex:1;height:1px;background:#e3e7e9;margin:0 16px;}
.review-swiper-button-prev,.review-swiper-button-next{
  background:none;border:none;color:#15b6e6;font-weight:500;font-size:14px;cursor:pointer;letter-spacing:1px;transition:color .2s;}
.review-swiper-button-prev:hover,.review-swiper-button-next:hover{color:#127d9b;}
.review-swiper-pagination{
  grid-row:2; /* second row = under the nav */
  position:static!important;
  display:flex;justify-content:center;
  max-width:520px;width:100%;
  margin:0; /* make sure no top margins pull it above */
}

/* kill any previous flex-order rules if present */
.review-controls[style]{flex-direction:unset!important;}
.partner-carousel .partner-slide{
    display:flex;
    align-items:center;
    justify-content:center;
    height: 110px; /* gives space for bigger logos */
  }

  

  /* MOBILE: make logos bigger */
  @media (max-width: 767px){
    .partner-carousel .partner-slide{
      height: 140px;
      padding: 10px 0;
    }

    .partner-carousel .partner-slide img{
      max-height: 110px;  /* <-- bigger on mobile */
    }
  }

</style>


<section class="top-review bg-grey" style="position:relative;">
  <div class="container">
    <div class="section-title text-center">
      <span class="sub-title">Testimonial</span>
      <h2>Our Clients Feedback</h2>
    </div>

    <div class="swiper review-swiper mt-5">
      <div class="swiper-wrapper">
        <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="swiper-slide">
          <div class="review-card">
            <div class="review-stars">
              <?php for($i=0;$i<5;$i++): ?>
                <i class="fa fa-star" style="color:#FEB800;"></i>
              <?php endfor; ?>
            </div>

            <div class="review-text"><?php echo $review->description; ?></div>

            <div class="review-author d-flex align-items-center mt-4">
              <div>
                <strong><?php echo e($review->name); ?></strong>
                <div style="font-size:15px;color:#4b4b4b;"><?php echo e($review->position); ?></div>
              </div>
              <span class="quote-mark" style="color:#38B5E6;font-size:36px;margin-left:auto;">&#10077;</span>
            </div>
          </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>

      <!-- Controls: NAV first, then DOTS under it -->
      <div class="review-controls">
        <div class="review-nav-center">
          <button class="review-swiper-button-prev">PREVIOUS</button>
          <div class="review-nav-line"></div>
          <button class="review-swiper-button-next">NEXT</button>
        </div>
        <div class="review-swiper-pagination swiper-pagination"></div>
      </div>
    </div>
  </div>
</section>

<script src="https://unpkg.com/swiper@9/swiper-bundle.min.js"></script>
<script>
// debounce helper
const debounce=(fn,wait)=>{let t;return(...a)=>{clearTimeout(t);t=setTimeout(()=>fn(...a),wait)}};

// Equalize all cards to the tallest
function equalizeReviewCardHeights(){
  const cards=document.querySelectorAll('.review-card');
  if(!cards.length) return;
  let maxH=0;
  cards.forEach(c=>c.style.height='auto');
  cards.forEach(c=>maxH=Math.max(maxH,c.offsetHeight));
  cards.forEach(c=>c.style.height=maxH+'px');
}

document.addEventListener('DOMContentLoaded',function(){
  const swiper=new Swiper('.review-swiper',{
    loop:false,
    autoHeight:false,
    speed:450,
    spaceBetween:24,
    slidesPerView:1,
    breakpoints:{768:{slidesPerView:2,spaceBetween:24},1200:{slidesPerView:3,spaceBetween:28}},
    navigation:{nextEl:'.review-swiper-button-next',prevEl:'.review-swiper-button-prev'},
    pagination:{el:'.review-swiper-pagination',clickable:true,dynamicBullets:true},
    on:{init(){equalizeReviewCardHeights();},imagesReady(){equalizeReviewCardHeights();},resize(){equalizeReviewCardHeights();}}
  });

  window.addEventListener('load',equalizeReviewCardHeights);
  window.addEventListener('resize',debounce(equalizeReviewCardHeights,150));
});
</script>



<section class="partners py-5" style="background:#fff;">
    <div class="container">
        <div class="section-title text-center mb-4">
            <h2>Memberships and Accreditations</h2>
        </div>
        <div class="partner-carousel-container">
            <div class="swiper partner-carousel">
                <div class="swiper-wrapper align-items-center">
                    <!-- Each slide represents a logo -->
                    <div class="swiper-slide partner-slide">
                        <img src="https://kagensee.com/wp-content/uploads/2025/04/iso-9001-logo-236FB79836-seeklogo.com_.png" alt="ISO 9001" />
                    </div>
                    <div class="swiper-slide partner-slide">
                        <img src="https://kagensee.com/wp-content/uploads/2025/04/iso-14001-2.png" alt="ISO 14001" />
                    </div>
                    <div class="swiper-slide partner-slide">
                        <img src="https://kagensee.com/wp-content/uploads/2025/04/WhatsApp_Image_2025-04-11_at_13.14.13_de04aad3__1_-removebg-preview.png" alt="Partner Logo" />
                    </div>
                    <div class="swiper-slide partner-slide">
                        <img src="https://kagensee.com/wp-content/uploads/2025/04/WWTT.png" alt="WWTT" />
                    </div>
                    <div class="swiper-slide partner-slide">
                        <img src="<?php echo e(asset('assets/images/partners/logo-1.jpg')); ?>" alt="Partner Logo" />
                    </div>
                    <div class="swiper-slide partner-slide">
                        <img src="https://kagensee.com/wp-content/uploads/2025/02/ATTAL-LOGO.png" alt="ATTAL" />
                    </div>
                    <div class="swiper-slide partner-slide">
                        <img src="<?php echo e(asset('assets/images/partners/logo-3.jpg')); ?>" alt="Partner Logo" />
                    </div>
                    <div class="swiper-slide partner-slide">
                        <img src="<?php echo e(asset('assets/images/partners/logo-4.jpg')); ?>" alt="Partner Logo" />
                    </div>
                    <div class="swiper-slide partner-slide">
                        <img src="<?php echo e(asset('assets/images/partners/logo-5.jpg')); ?>" alt="Partner Logo" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://unpkg.com/swiper@9/swiper-bundle.min.js"></script>
<script>
// debounce
const debounce=(fn,wait)=>{let t;return(...a)=>{clearTimeout(t);t=setTimeout(()=>fn(...a),wait)}};

// equalize card heights
function equalizeReviewCardHeights(){
  const cards=document.querySelectorAll('.review-card');
  if(!cards.length) return;
  let maxH=0;
  cards.forEach(c=>c.style.height='auto');
  cards.forEach(c=>maxH=Math.max(maxH,c.offsetHeight));
  cards.forEach(c=>c.style.height=maxH+'px');
}

document.addEventListener('DOMContentLoaded',function(){
  const swiper=new Swiper('.review-swiper',{
    loop:false,
    autoHeight:false,
    speed:450,
    spaceBetween:24,
    slidesPerView:1,
    breakpoints:{768:{slidesPerView:2,spaceBetween:24},1200:{slidesPerView:3,spaceBetween:28}},
    navigation:{nextEl:'.review-swiper-button-next',prevEl:'.review-swiper-button-prev'},
    pagination:{el:'.review-swiper-pagination',clickable:true,dynamicBullets:true},
    on:{init(){equalizeReviewCardHeights();},imagesReady(){equalizeReviewCardHeights();},resize(){equalizeReviewCardHeights();}}
  });

  window.addEventListener('load',equalizeReviewCardHeights);
  window.addEventListener('resize',debounce(equalizeReviewCardHeights,150));

  const wrapper=document.querySelector('.review-swiper .swiper-wrapper');
  if(window.MutationObserver && wrapper){
    new MutationObserver(debounce(equalizeReviewCardHeights,50))
      .observe(wrapper,{childList:true,subtree:true,characterData:true});
  }
});
</script>








<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u133514729/domains/worldwidetravel-lb.com/public_html/core/resources/views/front/index.blade.php ENDPATH**/ ?>