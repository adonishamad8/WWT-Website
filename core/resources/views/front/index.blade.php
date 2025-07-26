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
                   <div class="swiper-content" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index:2; width:100%; max-width:900px; text-align:center;">
                      <h1 style="color:#fff; font-size:48px; font-weight:700; text-shadow:0 3px 20px rgba(0,0,0,0.9);">{!! $slider->name !!}</h1>
                      <p class="mar-bottom-30" style="color:#fff; font-size:22px; text-shadow:0 3px 20px rgba(0,0,0,0.7);">{!! $slider->description !!}</p>
                      @if(isset($ctaLinks[$key]))
                        <a href="{{ $ctaLinks[$key] }}" class="wt-btn" style="margin-top:30px; font-size:18px; padding:14px 38px;">
                          {{ $ctaTitle }}
                        </a>
                      @endif
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

<section class="flash-post">
   <div class="container">
      <div class="section-title">
         <h2>Packages</h2>
      </div>
      <div class="flash-post-main display-flex">
        @foreach($cats as $cat)
           <div class="flash-list">
              <div class="flash-image">
                 <img src="{{ $cat->getFirstMediaUrl('category', 'thumb-large') }}" alt="{!! $cat->name !!}"/>
              </div>
              <div class="flash-content">
                 <h2 class="white">{!! $cat->name !!}</h2>
                 <a href="{{ route('front.package', [$cat->id, $cat->slug]) }}" class="wt-btn">See More</a>
              </div>
           </div>
        @endforeach
      </div>
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
<section class="blog pad-top-0 mar-bottom-50">
   <div class="container">
      <div class="section-title">
         <h2>Latest News & Events</h2>
      </div>
      <div class="blog-home-main">
         <div class="row">
            @foreach($events as $event)
              <div class="col-lg-6 col-sm-6 col-12">
                 <div class="grid">
                    <div class="grid-item">
                       <div class="grid-image">
                          <img src="{{ $event->getFirstMediaUrl('event', 'thumb-medium') }}" alt="{!! $event->name !!}"/>
                       </div>
                       <div class="gridblog-content">
                          <div class="date mar-bottom-15"><i class="far fa-calendar-alt"></i> {{ Carbon\Carbon::parse($event->date)->format('d M, Y') }}</div>
                          <h3><a href="{{ route('front.event.show', [$event->id, $event->slug]) }}">{!! $event->name !!}</a></h3>
                          <a href="{{ route('front.event.show', [$event->id, $event->slug]) }}" class="wt-btn wt-btn1">Read More</a>
                       </div>
                    </div>
                 </div>
              </div>
            @endforeach
         </div>
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
<section class="top-review bg-grey">
   <div class="container">
      <div class="row display-flex">
         <div class="col-lg-5 col-12">
            <div class="section-title title-full width100">
               <h2>Top <span>Reviews</span></h2>
=======
      <section class="banner">
         <div class="slider">
            <div class="swiper-container">
               <div class="swiper-wrapper">
				@foreach($sliders as $slider)
                  <div class="swiper-slide">
                     <div class="slide-inner">
                        <div class="slide-image" style="background-image: url({{ $slider->getFirstMediaUrl('slider', 'thumb-large') }})"></div>
                           <div class="swiper-content">
                              <span class="slider-subtitle">Get unforgettable pleasure with us</span>
                              <h1 class="slider-title">{!! $slider->name !!}</h1>
                              <p class="mar-bottom-30">{!! $slider->description !!}</p>
                              <!--<a href="#" class="wt-btn">Explore More</a>-->
                           </div>
                        <div class="overlay"></div>
                     </div>
                  </div>
				@endforeach
               </div>
               <div class="swiper-button-next"></div>
               <div class="swiper-button-prev"></div>
>>>>>>> 75904080194025d986ca261afc30fa98c30e19ec
            </div>
         </div>
         <div class="col-lg-7 col-12">
            <div class="review-wrap">
               <div class="about-slider">
                @foreach($reviews as $review)
                    <div class="col-lg-4 reviews-list align-center">
                       <div class="list-rv-detail">
                          <p class="mar-0">
                             <i class="fa fa-quote-left mar-right-10"></i> {!! $review->description !!}
                          </p>
                       </div>
                       <div class="rev-author mar-top-20">
                          <!--<div class="rev-image"><img src="{{ $review->getFirstMediaUrl('review', 'thumb-medium') }}" alt="{!! $review->name !!}"/></div>-->
                          <div class="rev-content mar-left-20">
                             <h4 class="mar-bottom-5">{!! $review->name !!}</h4>
                             <p class="mar-bottom-5">{!! $review->position !!}</p>
                          </div>
                       </div>
                    </div>
                @endforeach
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="partners">
   <div class="container">
      <div class="section-title">
         <h2>Memberships and Accreditations</h2>
      </div>
      <div class="dest-partner">
         <div class="row justify-content-md-center" >
            <div class="col-lg-2 col-6" >
               <img src="https://kagensee.com/wp-content/uploads/2025/04/iso-9001-logo-236FB79836-seeklogo.com_.png" width="100%" alt="Site" />
            </div>
            <div class="col-lg-2 col-6" >
               <img src="https://kagensee.com/wp-content/uploads/2025/04/iso-14001-2.png" width="100%" alt="Site" />
            </div>
            <div class="col-lg-2 col-6" >
               <img src="https://kagensee.com/wp-content/uploads/2025/04/WhatsApp_Image_2025-04-11_at_13.14.13_de04aad3__1_-removebg-preview.png" width="100%" alt="Site" />
            </div>
            <div class="col-lg-2 col-6">
               <img src="https://kagensee.com/wp-content/uploads/2025/04/WWTT.png" width="100%" alt="Site" />
            </div>
            <div class="col-lg-2 col-6">
               <img src="{{asset('assets/images/partners/logo-1.jpg')}}" width="100%" alt="Site" />
            </div>
            <div class="col-lg-2 col-6">
               <img src="https://kagensee.com/wp-content/uploads/2025/02/ATTAL-LOGO.png" width="100%" alt="Association of Travel and Tourist Agent in Lebanon" />
            </div>
            <div class="col-lg-2 col-6">
               <img src="{{asset('assets/images/partners/logo-3.jpg')}}" width="100%" alt="Lebanese Cluster" />
            </div>
            <div class="col-lg-2 col-6">
               <img src="{{asset('assets/images/partners/logo-4.jpg')}}" width="100%" alt="IATA" />
            </div>
            <div class="col-lg-2 col-6">
               <img src="{{asset('assets/images/partners/logo-5.jpg')}}" width="100%" alt="ASTA" />
            </div>
         </div>
      </div>
   </div>
</section>

@endsection
