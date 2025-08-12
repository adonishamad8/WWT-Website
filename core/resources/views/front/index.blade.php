@extends('layouts.header')
@section('title', 'Home')
@section('description', '')
@section('keywords', '')
@section('content')


<!-- ===== HERO SLIDER SECTION START ===== -->
<section class="banner">
   <div class="slider">
      <div class="swiper-container">
         <div class="swiper-wrapper">
            @php
                $ctaLinks = [
                  'https://worldwidetravel-lb.com/packages/2/where-to-travel',             // Slide 1
                  'https://worldwidetravel-lb.com/packages/1/gem-of-the-middle-east',      // Slide 2
                  'https://worldwidetravel-lb.com/packages/3/special-promotion',           // Slide 3
                  'https://worldwidetravel-lb.com/packages/3/special-promotion',           // Slide 4
                ];
                $ctaTitle = 'Explore Packages';
            @endphp

  @foreach($sliders as $key => $slider)
 <div class="swiper-slide">
    <div class="slide-inner" style="position: relative;">
       <div class="slide-image" style="background-image: url({{ $slider->getFirstMediaUrl('slider', 'thumb-large') }}); background-size: cover; background-position: center; width: 100vw; height: 100vh; min-height: 600px;"></div>
       <div class="swiper-content"
            style="position: absolute; top: 50%; left: 0; right: 0; transform: translateY(-50%); z-index:2; text-align:left;">
          <div class="container">
              <span class="slider-subtitle" style="color:white">Get unforgettable pleasure with us</span>
              <h1 class="slider-title">{!! $slider->name !!}</h1>
              <p class="mar-bottom-30" style="color:#fff; font-size:22px; text-shadow:0 3px 20px rgba(0,0,0,0.7);">{!! $slider->description !!}</p>
              @if(isset($ctaLinks[$key]))
                <a href="{{ $ctaLinks[$key] }}" class="wt-btn" style="margin-top:30px; font-size:18px; padding:14px 38px;">
                  {{ $ctaTitle }}
                </a>
              @endif
          </div>
      </div>
       <div class="overlay" style="position:absolute; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.6); z-index:1;"></div>
    </div>
 </div>
@endforeach

         </div>
         <div class="swiper-button-next"></div>
         <div class="swiper-button-prev"></div>
      </div>
   </div>
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
                <h5 class="why-title">A Lot Of Discount</h5>
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
                <h5 class="why-title">Travel Management</h5>
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
            @foreach($packages as $package)
            <div class="swiper-slide">
                <div class="destination-category-item">
                    <!-- Make image clickable -->
                    <a href="{{ route('front.package.show', [$package->id, $package->slug]) }}" class="category-image-link" style="display:block;">
                        <img src="{{ $package->getFirstMediaUrl('package', 'thumb-medium') }}" alt="{{ $package->name }}" style="width:100%;display:block;">
                    </a>
                    <div class="category-content text-center">
                        <h5 style="margin-bottom: 14px; margin-top:10px;">
                            <a href="{{ route('front.package.show', [$package->id, $package->slug]) }}" style="color:#16303b; text-decoration:none;">
                                {{ $package->name }}
                            </a>
                        </h5>
                        <a href="{{ route('front.package.show', [$package->id, $package->slug]) }}" class="wt-btn-black" style="margin-top:4px;">View Package</a>
                    </div>
                </div>
            </div>
            @endforeach
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
            @foreach($services as $service)
                <div class="col-lg-3 col-sm-6 col-12">
                    <a href="{{ route('front.service.show', [$service->id, $service->slug]) }}">
                        <div class="why-us-item why-us-item1 text-center">
                            <div class="why-us-icon">
                               <img src="{{ $service->getFirstMediaUrl('serviceThumb') }}" width="100" alt="{!! $service->name !!}"/>
                            </div>
                            <div class="why-us-content">
                               <h3>{!! $service->name !!}</h3>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
         </div>
      </div>
   </div>
</section>

<section class="top-destinations destination1" style="padding: 150px 0;">
   <div class="container">
      <div class="section-title dest-title">
         <h2 class="white">Popular Destinations</h2>
      </div>
      <div class="content">
         <div class="row rental-slider">
            @foreach($packages as $package)
            <div class="col-lg-4">
             <div class="td-item">
                <div class="td-image">
                   <img src="{{ $package->getFirstMediaUrl('package', 'thumb-medium') }}" alt="{!! $package->name !!}"/>
                </div>
                <div class="td-content text-center">
                   <h3>{!! $package->name !!}</h3>
                   <a href="{{ route('front.package.show', [$package->id, $package->slug]) }}" class="wt-btn">Book Now</a>
                </div>
             </div>
             </div>
            @endforeach
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
    @foreach($events as $index => $event)
        @php
            // Alternate: odd=image, even=text, so 1st=image, 2nd=text, 3rd=image, etc.
            $cardType = ($index % 2 == 0) ? 'image' : 'text';
        @endphp

        <div class="col-xl-4 col-lg-6 col-md-6 d-flex mb-4">
            <div class="news-card-items flex-fill" style="height: 100%;">
                @if($cardType == 'image')
                    <div class="news-image" style="height:270px;overflow:hidden;">
                        <img src="{{ $event->getFirstMediaUrl('event', 'thumb-medium') }}" alt="{{ $event->name }}" style="width:100%;height:100%;object-fit:cover;">
                    </div>
                @else
                    <div class="news-content" style="height:270px;display:flex;flex-direction:column;justify-content:center;">
                        <ul class="post-meta" style="margin-bottom:10px;">
                            <li>
                                <i class="fa-regular fa-calendar-days"></i>
                                {{ \Carbon\Carbon::parse($event->date)->format('F d, Y') }}
                            </li>
                            <li>
                                <i class="fa-solid fa-tag"></i>
                                {{ $event->category ?? 'General' }}
                            </li>
                        </ul>
                        <h3 style="margin-bottom:8px;">
                            <a href="{{ route('front.event.show', [$event->id, $event->slug]) }}">
                                {{ Str::limit($event->name, 60) }}
                            </a>
                        </h3>
                        <a href="{{ route('front.event.show', [$event->id, $event->slug]) }}" class="link-btn">
                            Read More <i class="fa-sharp fa-regular fa-arrow-right"></i>
                        </a>
                    </div>
                @endif
            </div>
        </div>
    @endforeach
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
         <a href="{!! route('front.contact') !!}" class="wt-btn-white btn-width">Get in Touch</a>
      </div>
   </div>
</section>
<section class="top-review bg-grey" style="position:relative;">
   <div class="container">
      <div class="section-title text-center">
         <span class="sub-title">Testimonial</span>
         <h2>Our Clients Feedback</h2>
      </div>
      <div class="swiper review-swiper mt-5">
         <div class="swiper-wrapper">
            @foreach($reviews as $review)
            <div class="swiper-slide">
               <div class="review-card">
                  <div class="review-stars">
                      @for($i = 0; $i < 5; $i++)
                        <i class="fa fa-star{{ $i < 4 ? '' : '-o' }}" style="color:#FEB800;"></i>
                      @endfor
                  </div>
                  <div class="review-text">
                     {!! $review->description !!}
                  </div>
                  <div class="review-author d-flex align-items-center mt-4">
                     <div>
                        <strong>{{ $review->name }}</strong>
                        <div style="font-size:15px;color:#4b4b4b;">{{ $review->position }}</div>
                     </div>
                     <span class="quote-mark" style="color:#38B5E6;font-size:36px;margin-left:auto;">&#10077;</span>
                  </div>
               </div>
            </div>
            @endforeach
         </div>
         <div class="review-nav-center">
  <button class="review-swiper-button-prev" style="font-size:20px !important;">PREVIEWS</button>
  <div class="review-nav-line"></div>
  <button class="review-swiper-button-next"style="font-size:20px !important;">NEXT</button>
</div>

      </div>
   

   </div>
<img id="animated-bag"
     class="swing-bag"
     src="https://kagensee.com/wp-content/uploads/2025/07/bag.png"
     style="position: absolute; bottom: 0; right: 2vw; width: 160px; z-index: 2; pointer-events: none;" alt="Bag">

</section>

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
                        <img src="{{asset('assets/images/partners/logo-1.jpg')}}" alt="Partner Logo" />
                    </div>
                    <div class="swiper-slide partner-slide">
                        <img src="https://kagensee.com/wp-content/uploads/2025/02/ATTAL-LOGO.png" alt="ATTAL" />
                    </div>
                    <div class="swiper-slide partner-slide">
                        <img src="{{asset('assets/images/partners/logo-3.jpg')}}" alt="Partner Logo" />
                    </div>
                    <div class="swiper-slide partner-slide">
                        <img src="{{asset('assets/images/partners/logo-4.jpg')}}" alt="Partner Logo" />
                    </div>
                    <div class="swiper-slide partner-slide">
                        <img src="{{asset('assets/images/partners/logo-5.jpg')}}" alt="Partner Logo" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
