<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
	  <meta name="csrf-token" content="{{ csrf_token() }}" />
      <title>@yield('title') | Worldwide Travel & Tourism</title>
      <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/favicon.png')}}">
      <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
      <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
      <link rel="stylesheet" href="{{asset('assets/css/default.css')}}">
      <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
      <link rel="stylesheet" href="{{asset('assets/css/plugin.css')}}">
      <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@700&family=Montserrat:wght@700;800&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />




      <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-KJ84JQB7');</script>
<!-- End Google Tag Manager -->
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-Y90NZ191W8"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-Y90NZ191W8');
</script>
   </head>
   <body>
      <header class="main_header_area">
         <div class="header-content">
            <div class="container">
               <div class="links links-left">
                  <ul>
                     <li>
                        <a target="_Blank" href="https://wa.me/+96170275475"><i class="fab fa-whatsapp"></i> &nbsp;+961 70 275 475</a>
                     </li>
                     <li>
                        <a href="mailto:info@worldwidetravel-lb.com"><i class="fa fa-envelope"></i> &nbsp;info@worldwidetravel-lb.com</a>
                     </li>
                  </ul>
               </div>
               <div class="links links-right pull-right">
                  <ul>
                     <li>
                        <ul class="social-links">
                           <li>
                              <a target="_Blank" href="https://www.facebook.com/worldwidetravelandtourism"><i class="fab fa-facebook" aria-hidden="true"></i></a>
                           </li>
                           <li>
                              <a target="_Blank" href="https://www.instagram.com/worldwidetravelandtourism/"><i class="fab fa-instagram" aria-hidden="true"></i></a>
                           </li>
                           <li>
                              <a target="_Blank" href="https://www.linkedin.com/company/worldwide-travel-and-tourism/"><i class="fab fa-linkedin" aria-hidden="true"></i></a>
                           </li>
                        </ul>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
         <div class="header_menu affix-top">
            <nav class="navbar navbar-default">
               <div class="container">
                  <div class="navbar-flex">
                     <div class="navbar-header">
                        <a href="/" class="navbar-brand">
                        <img src="{{asset('assets/images/logo.png')}}" width="150" alt="Worldwide Travel & Tourism"/>
                        </a>
                     </div>
                     <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav" id="responsive-menu">
                           <li class="{{ Route::currentRouteName() == 'front.home' ? 'active' : '' }}"><a href="/">Home</a></li>
                           <li class="{{ Route::currentRouteName() == 'front.about' ? 'active' : '' }}"><a href="{!! route('front.about') !!}">About Us</a></li>
                           <li class="{{ Route::currentRouteName() == 'front.mice' ? 'active' : '' }}"><a href="{!! route('front.mice') !!}">Mice</a></li>
                           <li class="submenu dropdown {{ Route::currentRouteName() == 'front.package' ? 'active' : '' }} || {{ Route::currentRouteName() == 'front.package.show' ? 'active' : '' }}">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Packages <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                              <ul class="dropdown-menu">
                                @foreach($categories as $value => $category)
									<li><a href="{{ route('front.package', [$category->id, $category->slug]) }}">{!! $category->name !!}</a></li>
								@endforeach
                              </ul>
                           </li>
                           <li class="{{ Route::currentRouteName() == 'front.events' ? 'active' : '' }} || {{ Route::currentRouteName() == 'front.event.show' ? 'active' : '' }}"><a href="{!! route('front.events') !!}">News</a></li>
                           <li class="{{ Route::currentRouteName() == 'front.blogs' ? 'active' : '' }} || {{ Route::currentRouteName() == 'front.blog.show' ? 'active' : '' }}"><a href="{!! route('front.blogs') !!}">Events</a></li>
                           <li class="{{ Route::currentRouteName() == 'front.contact' ? 'active' : '' }}"><a href="{!! route('front.contact') !!}">Contact Us</a></li>
                        </ul>
                     </div>
                     <div id="slicknav-mobile"></div>
                  </div>
               </div>
            </nav>
         </div>
      </header>
	@yield('content')
  <footer style="background:#252525; color:#fff; font-family: 'Montserrat', sans-serif; font-Weight:400 !important;">
    <div class="custom-footer-container">
        <!-- Left block: Logo, Newsletter, Socials -->
        <div class="footer-left">
            <div class="footer-logo-wrap">
                <img src="{{ asset('assets/images/logo.png') }}" alt="Worldwide Travel & Tourism" class="footer-logo" style="width:50%; height:auto; margin-bottom:12px;">
                <div style="font-size:2.2rem; font-weight:400; margin-bottom:2px;">Worldwide</div>
                <div style="font-size:1.1rem; color:#b1e2ef; margin-bottom:16px;">Travel & Tourism</div>
            </div>
            <div class="footer-newsletter-title" style="font-size:1.5rem; font-weight:400; margin-bottom:7px;">Subscribe Newsletter</div>
            <div style="font-size:1rem; color:#eee; margin-bottom:12px;">Get Our Latest Deals and Update</div>
            <form class="footer-newsletter-form" autocomplete="off" style="margin-bottom:18px;">
                <input type="email" placeholder="Your Email Address" required style="width:100%;max-width:320px;padding:12px 18px;font-size:1.05rem;border-radius:25px;border:none;margin-bottom:10px;">
                <button type="submit" style="background:#27b0d7;color:#fff;font-weight:400;border:none;border-radius:25px;padding:13px 0;width:100%;max-width:320px;font-size:1.1rem;display:block;transition:background 0.2s;">Subscribe &nbsp;→</button>
            </form>
            <div class="footer-socials" style="display:flex;gap:18px;">
                <a href="https://facebook.com/worldwidetravelandtourism" target="_blank" style="background:#fff;width:44px;height:44px;border-radius:50%;display:flex;align-items:center;justify-content:center;"><i class="fab fa-facebook-f" style="color:#27b0d7;font-size:1.35rem;"></i></a>
                <a href="https://instagram.com/worldwidetravelandtourism" target="_blank" style="background:#fff;width:44px;height:44px;border-radius:50%;display:flex;align-items:center;justify-content:center;"><i class="fab fa-instagram" style="color:#27b0d7;font-size:1.35rem;"></i></a>
                <a href="https://linkedin.com/company/worldwide-travel-and-tourism/" target="_blank" style="background:#fff;width:44px;height:44px;border-radius:50%;display:flex;align-items:center;justify-content:center;"><i class="fab fa-linkedin-in" style="color:#27b0d7;font-size:1.35rem;"></i></a>
            </div>
        </div>
        <!-- Middle block: Quick Links and Services -->
        <div class="footer-mid">
            <div class="footer-col">
                <div class="footer-col-title">Quick Links</div>
                <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="{{ route('front.about') }}">About Us</a></li>
                    <li><a href="{{ route('front.blogs') }}">Blog</a></li>
                    <li><a href="{{ route('front.services') }}">Services</a></li>

                </ul>
            </div>
            <div class="footer-col">
                <div class="footer-col-title">Services</div>
            <ul class="footer-contact-list">
                <li><i class="fa fa-map-marker" style="color:#27b0d7; margin-right:7px;"></i> Ain El Mreisseh, Ibn Sina Str. MINA 365,
5th Floor, Beirut – Lebanon</li>
                <li><i class="fa fa-envelope" style="color:#27b0d7; margin-right:7px;"></i> info@worldwidetravel-lb.com</li>
                <li><i class="fa fa-phone" style="color:#27b0d7; margin-right:7px;"></i> +961 1 366 505</li>
            </ul>
            </div>
        </div>
        <!-- Right block: Contact -->
    
    </div>
    <div class="custom-footer-bottom">
        <div class="custom-footer-copy">Copyright © {{ date('Y') }} <span style="color:#27b0d7;">Worldwide Travel & Tourism</span>. All Rights Reserved.</div>
        <div class="custom-footer-links">
            <a href="#" style="color:#fff;">Terms of use</a>
            <span style="margin:0 7px;">|</span>
            <a href="#" style="color:#fff;">Privacy Policy</a>
        </div>
    </div>
</footer>

      <div id="back-to-top">
         <a href="#"></a>
      </div>
      <!-- WhatsApp (same scroll-trigger as back-to-top) -->
<div id="whatsapp-button">
  <a href="https://wa.me/96179119311" target="_blank" rel="noopener" aria-label="Chat on WhatsApp"></a>
</div>

      </script><script src="{{asset('assets/js/jquery-3.3.1.min.js')}}"></script>
      <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
      <script src="{{asset('assets/js/plugin.js')}}"></script>
      <script src="{{asset('assets/js/menu.js')}}"></script>
      <script src="{{asset('assets/js/custom-swiper2.js')}}"></script>
      <script src="{{asset('assets/js/custom-nav.js')}}"></script>
      <script src="{{asset('assets/js/main.js')}}"></script>
	  @yield('scripts')
	  <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KJ84JQB7"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<!-- ... your HTML ... -->

<!-- Swiper JS (include only once in your whole website) -->
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

<!-- Initialize Swiper carousel -->
<script>

var swiper = new Swiper('.category-slider', {
    slidesPerView: 'auto',
    spaceBetween: 24,
    loop: false,
    pagination: {
        el: '.swiper-dot4',
        clickable: true,
        bulletClass: 'dot',
        bulletActiveClass: 'dot-active'
    },
    breakpoints: {
        900: { slidesPerView: 4, spaceBetween: 32 },
        600: { slidesPerView: 2, spaceBetween: 16 },
        0: { slidesPerView: 1.3, spaceBetween: 8 }
    }
    
    
});

</script>
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
<script>

});
</script>
<script>
var reviewSwiper = new Swiper('.review-swiper', {
    slidesPerView: 1,
    spaceBetween: 30,
    loop: true,
    navigation: {
        nextEl: '.review-swiper-button-next',
        prevEl: '.review-swiper-button-prev'
    },
    // REMOVE the 'pagination' section here (no dots)
    breakpoints: {
      900: { slidesPerView: 3, spaceBetween: 24 },
      600: { slidesPerView: 2, spaceBetween: 18 },
      0:   { slidesPerView: 1, spaceBetween: 10 }
    }
});
</script>

<script>
// Simple floating animation for the bag image
document.addEventListener('DOMContentLoaded', function() {
    const bag = document.getElementById('animated-bag');
    if(bag) {
        let direction = 1, pos = 0;
        setInterval(()=>{
            pos += direction * 0.7;
            if(pos > 22 || pos < -14) direction *= -1;
            bag.style.transform = `translateX(${pos}px)`;
        }, 16);
    }
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var partnerSwiper = new Swiper('.partner-carousel', {
        slidesPerView: 5,
        centeredSlides: true,
        loop: true,
        spaceBetween: 36,
        autoplay: {
            delay: 2200,
            disableOnInteraction: false
        },
        breakpoints: {
            1024: { slidesPerView: 5 },
            600:  { slidesPerView: 3 },
            0:    { slidesPerView: 2 }
        },
        // Optional: hide navigation/pagination
        // If you want navigation arrows, add these lines:
        // navigation: {
        //     nextEl: '.partner-next',
        //     prevEl: '.partner-prev'
        // }
    });
});
</script>



</body>
</html>

   </body>
   
</html>