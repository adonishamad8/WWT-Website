@extends('layouts.header')
@section('title', 'About Us')
@section('description', '')
@section('keywords', '')
@section('content')
      <section class="breadcrumb-outer text-center">
         <div class="container">
            <div class="breadcrumb-content">
               <h2 class="white">About Us</h2>
               <nav aria-label="breadcrumb">
                  <ul class="breadcrumb">
                     <li class="breadcrumb-item"><a href="/">Home</a></li>
                     <li class="breadcrumb-item active" aria-current="page">About Us</li>
                  </ul>
               </nav>
            </div>
         </div>
          <!--<div class="overlay"></div>-->
      </section>
      <section class="why-us pad-top-80">
         <div class="container">
            <div class="why-us-about mar-bottom-60">
			@foreach($abouts as $about)
				@if ($about->type == 'about')
               <div class="row display-flex">
                  <div class="col-lg-12 col-12">
                     <div class="why-about-inner mar-bottom-50">
                        <h2>{!! $about->name !!}</h2>
                        <p>{!! $about->description !!}</h2>
                     </div>
                  </div>
                  <div class="col-lg-12 col-12"> 
                     <div class="why-about-image">
                        <img src="{{ $about->getFirstMediaUrl('about') }}" alt="{!! $about->name !!}" />
                     </div>
                  </div>
               </div>
			   @endif
			@endforeach
            </div>
            <div class="why-us-box">
               <div class="row">
			@foreach($abouts as $about)
				@if ($about->type == 'mission')
                  <div class="col-lg-4 col-md-4 col-12">
                     <div class="why-us-item display-flex">
                        <div class="why-us-content">
                           <h3 class="mar-bottom-10">{!! $about->name !!}</h3>
                           <p class="mar-0">{!! $about->description !!}</p>
                        </div>
                     </div>
                  </div>
				@endif
			@endforeach
			@foreach($abouts as $about)
				@if ($about->type == 'vision')
                  <div class="col-lg-4 col-md-4 col-12">
                     <div class="why-us-item display-flex">
                        <div class="why-us-content">
                           <h3 class="mar-bottom-10">{!! $about->name !!}</h3>
                           <p class="mar-0">{!! $about->description !!}</p>
                        </div>
                     </div>
                  </div>
				@endif
			@endforeach
			@foreach($abouts as $about)
				@if ($about->type == 'values')
                  <div class="col-lg-4 col-md-4 col-12">
                     <div class="why-us-item display-flex">
                        <div class="why-us-content">
                           <h3 class="mar-bottom-10">{!! $about->name !!}</h3>
                           <p class="mar-0">{!! $about->description !!}</p>
                        </div>
                     </div>
                  </div>
				@endif
			@endforeach
               </div>
            </div>
         </div>
      </section>
	   <!-- A Growing Legacy Section -->
      <section class="legacy">
         <div class="container">
            <div class="section-title">
               <h2>A Growing Legacy in <span>Travel, Tourism & Events</span></h2>
            </div>
            <div class="legacy-box">
               <div class="legacy-item">
                  <img src="https://kagensee.com/wp-content/uploads/2025/02/high-quality.png" width="120" alt="Membership Icon">
                  <div class="legacy-text">
                      <h4>9</h4>
                      <p>Memberships & Accreditations</p>
                  </div>
               </div>
               <div class="legacy-item">
                  <h5 id="counter35">0+ years</h5>
                  <p>of industry expertise</p>
               </div>
               <div class="legacy-item">
                  <img src="https://kagensee.com/wp-content/uploads/2025/02/handshake.png" width="110" alt="Partners Icon">
                  <h4 id="counter">0+</h4>
                  <p>partners and providers worldwide</p>
               </div>
               <div class="legacy-item">
                  <h5 id="counter20" >0+ years</h5>
                  <p>of maintained relationships</p>
               </div>
               <div class="legacy-item2">
                  <div class="legacy-text">
                      <img src="https://kagensee.com/wp-content/uploads/2025/02/send-2.png" width="120" alt="Event Coverage Icon">
                      <div class="legacy-text2">
                          <h3 style="font-weight:900;font-size:80px;text-align:left;margin-bottom: -20px;" id="counter6">0+</h3>
                          <p>continents of event coverage</p>
                      </div>
                  </div>
               </div>
               <div class="legacy-item">
                  <h3 id="counter500">0+</h3>
                  <p>annual events managed worldwide</p>
               </div>
            </div>
         </div>
      </section>
	        <section class="why-us pad-top-70 bg-grey">
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
      <section class="call-to-action">
         <div class="container">
            <div class="row display-flex">
               <div class="col-lg-6 col-12">
                  <div class="action-content">
                     <h3 class="white package-name">SUMMER SPECIAL</h3>
                     <h2 class="white">SPEND THE BEST VACTION WITH US <br /><!--<span>The nights of Thailand</span>--></h2>
                     <a href="https://worldwidetravel-lb.com/packages/2/where-to-travel" class="wt-btn">View Details</a>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="tour-agent">
         <div class="container">
            <div class="section-title">
               <h2>Board <span>Members</span></h2>
            </div>
            <div class="agent-main">
               <div class="row">
				@foreach($boards as $board)
                  <div class="col-lg-3 col-sm-6">
                     <div class="agent-list">
                        <div class="agent-image">
                           <img src="{{ $board->getFirstMediaUrl('board', 'thumb-large') }}" alt="{!! $board->name !!}"/>
                           <div class="agent-content">
                              <h3 class="white mar-bottom-5">{!! $board->name !!}</h3>
                              <p class="white mar-0">{!! $board->position !!}</p>
                           </div>
                        </div>
                        <!--<div class="agent-social">
                           <ul class="social-links">
                              <li>
                                 <a target="_Blank" href="{!! $board->facebook !!}"><i class="fab fa-facebook" aria-hidden="true"></i></a>
                              </li>
                              <li>
                                 <a target="_Blank" href="{!! $board->instagram !!}"><i class="fab fa-instagram" aria-hidden="true"></i></a>
                              </li>
                              <li>
                                 <a target="_Blank" href="{!! $board->linkedin !!}"><i class="fab fa-linkedin" aria-hidden="true"></i></a>
                              </li>
                           </ul>
                        </div> 
                        -->
                     </div>
                  </div>
				@endforeach
               </div>
            </div>
         </div>
            <style>
         /* Legacy Section */
         .legacy {
            padding: 70px 0;
         }
         .legacy .section-title {
            text-align: center;
            margin-bottom: 40px;
         }
         .legacy-box {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
         }
         .legacy-item {
            background: #fff;
            padding: 25px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
            width: 280px;
         }
         .legacy-item2 {
            background: #fff;
            padding: 25px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
            width: 500px;
         }
         .legacy-item:hover {
            transform: translateY(-5px);
         }
         .legacy-item2:hover {
            transform: translateY(-5px);
         }
         .legacy-item h3 {
            font-size: 80px;
            color: #58595b;
            font-weight:900 !important;
            margin-bottom: 10px;
            transition: color 0.3s ease-in-out;
         }
         .legacy-item h4 {
            font-size: 80px;
            color: #58595b;
            font-weight: 900;
            margin-bottom: 10px;
            transition: color 0.3s ease-in-out;
            display: inline-block;
            position: relative;
            padding-right: 10px;
         }
         .legacy-item h5 {
            font-size: 60px;
            color: #58595b;
            font-weight: 900 ;
            margin-bottom: 10px;
            transition: color 0.3s ease-in-out;
            line-height: 1;
            padding-top: 20px;
         }
         .legacy-item2 h3 {
            font-size: 80px;
            color: #58595b;
            font-weight: 900;
            margin-bottom: 10px;
            transition: color 0.3s ease-in-out;
         }
         .legacy-item p {
            font-size: 16px;
            color: #333;
            margin: 0;
         }
         .legacy-item2 p {
            font-size: 16px;
            color: #333;
            margin: 0;
         }
         .legacy-item img {
            margin-bottom: 15px;
            transition: transform 0.3s ease-in-out;
         }
         .legacy-item2 img {
            margin-bottom: 15px;
            transition: transform 0.3s ease-in-out;
         }
         .legacy-item:hover img {
            transform: scale(1.1);
         }
         .legacy-item2:hover img {
            transform: scale(1.1);
         }
         .legacy-text {
            display: flex;
            align-items: center;
            justify-content: center;
         }
         .legacy-text2 {
            display: block;
            text-align: center;
         }
           .legacy-item h3:hover{
               color:#6ac4eb;
           }
           
           .legacy-item h4:hover{
               color:#6ac4eb;
           }
           .legacy-item h5:hover{
               color:#6ac4eb;
           }
           
           .legacy-text2 h3:hover{
           color:#6ac4eb;

               
           }
           @media (max-width: 991px) {
    .why-about-inner {
        text-align:left !important;
    }}
           
      </style>

      <script>
      document.addEventListener("DOMContentLoaded", function() {
    let legacySection = document.querySelector(".legacy");
    if (!legacySection) return;

    let observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                console.log("Legacy section visible - Starting counters!");
                startCounters();
                observer.unobserve(legacySection); // Stop observing after it starts
            }
        });
    }, { threshold: 0.2 }); // Reduced threshold for mobile

    observer.observe(legacySection);

    function startCounters() {
        animateCounter('counter', 400, 5);
        animateCounter('counter35', 35, 50);
        animateCounter('counter6', 6, 250);
        animateCounter('counter500', 500, 5);
        animateCounter('counter20', 20, 50);
    }

    function animateCounter(id, target, speed) {
        let counterElement = document.getElementById(id);
        if (!counterElement) return;
        
        let count = 0;
        let interval = setInterval(() => {
            if (count < target) {
                count++;
                counterElement.textContent = count + "+";
            } else {
                clearInterval(interval);
            }
        }, speed);
    }

    // Fallback: Start counters when user scrolls on mobile
    window.addEventListener("scroll", function() {
        let rect = legacySection.getBoundingClientRect();
        if (rect.top < window.innerHeight && rect.bottom > 0) {
            console.log("Fallback trigger: Starting counters!");
            startCounters();
            window.removeEventListener("scroll", arguments.callee);
        }
    }, { passive: true });
});

      </script>
      </section>
      
@endsection