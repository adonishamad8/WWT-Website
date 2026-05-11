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
                                   <li><a href="https://worldwidetravel-lb.com/privacy">Policies</a></li>

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
<footer class="ww-footer">
  <div class="custom-footer-container ww-footer-inner">
    <!-- Left: brand + subscribe + socials -->
    <div class="footer-left">
      <div class="footer-logo-wrap">
        <img src="{{ asset('assets/images/logo.png') }}" alt="Worldwide Travel & Tourism" class="footer-logo" style="width:185px;height:auto;">
      </div>

      <a href="https://darkslategray-eland-801260.hostingersite.com/subscribe" class="btn-subscribe">
        Subscribe Now <span class="arr">→</span>
      </a>

      <div class="footer-socials ww-socials">
        <a href="https://instagram.com/worldwidetravelandtourism" target="_blank" aria-label="Instagram">
          <i class="fab fa-instagram"></i>
        </a>
        <a href="https://facebook.com/worldwidetravelandtourism" target="_blank" aria-label="Facebook">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a href="https://linkedin.com/company/worldwide-travel-and-tourism/" target="_blank" aria-label="LinkedIn">
          <i class="fab fa-linkedin-in"></i>
        </a>
      </div>
    </div>

    <!-- Middle: company -->
    <div class="footer-mid">
      <div class="footer-col">
        <div class="footer-col-title">Company</div>
        <ul>
          <li><a href="/">Home</a></li>
          <li><a href="{{ route('front.about') }}">About Us</a></li>
          <li><a href="{{ route('front.mice') }}">MICE</a></li>
          <li><a href="{{ route('front.package', [$categories->first()->id ?? 1, $categories->first()->slug ?? 'packages']) }}">Packages</a></li>
          <li><a href="{{ route('front.events') }}">News</a></li>
          <li><a href="{{ route('front.blogs') }}">Events</a></li>
        <li><a href="https://worldwidetravel-lb.com/privacy">Policies</a></li>

        </ul>
      </div>
    </div>

    <!-- Right: locate & contact -->
    <div class="footer-right">
      <div class="footer-col-title">Locate & Contact us!</div>

      <div class="addr-block">
        Ain El Mreisseh, Ibn Sina Str. MINA 365,<br>
        5th Floor, Beirut – Lebanon<br>
        <a href="tel:+96121366285" class="phone-link">+961 21 366 285</a>
      </div>

      <div class="addr-block">
        Clemenceau, Minet El-Hosn, Justinian<br>
        Str. Justinian Building, Ground Floor,<br>
        Beirut – Lebanon<br>
        <a href="tel:+9611366505" class="phone-link">+961 1 366 505</a>
      </div>

      <div class="mail-row">
        <i class="fa fa-envelope"></i>
        <a href="mailto:info@worldwidetravel-lb.com">info@worldwidetravel-lb.com</a>
      </div>
    </div>
  </div>

  <div class="ww-divider"></div>

  <div class="custom-footer-bottom ww-bottom">
    <div class="custom-footer-copy">
      Copyright © {{ date('Y') }} Worldwide Travel & Tourism. All Rights Reserved.
    </div>
    <div class="custom-footer-links">
      <a href="#">Terms</a> | <a href="#">Privacy Policies</a>
    </div>
  </div>
</footer>
<style>
    /* ===== FINAL FOOTER STYLE ===== */
.ww-footer {
  background: #1a1a1a6b !important;
  color: #fff !important;
  border-top-left-radius: 85px !important;
  border-top-right-radius: 85px !important;
  font-family: 'Montserrat', sans-serif !important;
  font-weight: 400 !important;
  overflow: hidden;
}

/* Container */
.ww-footer .custom-footer-container {
  display: flex;
  justify-content: space-between;
  flex-wrap: wrap;
  padding: 40px 30px 20px;
  gap: 40px;
}

/* --- LEFT COL --- */
.ww-footer .footer-left {
  flex: 1 1 300px;
}
.ww-footer .footer-logo {
  width: 160px;
  margin-bottom: 55px;
  margin-left:85px;
}
.ww-footer .btn-subscribe {
  display: inline-flex;
  align-items: center;
  gap: 10px;
  background: #F3C23D;
  color: #111 !important;
  font-weight: 600;
  padding: 12px 22px;
  border-radius: 30px;
  margin-bottom: 20px;
  text-decoration: none;
  transition: 0.2s;
  margin-left:85px;
  color: white !important;
           border: 2px solid white  !important; /* Width, Style, Color */

}
.ww-footer .btn-subscribe:hover {
  background: #e2b731;
}

/* Socials */
.ww-footer .footer-socials {
  display: flex;
  gap: 16px;
  margin-left:95px;
}
.ww-footer .footer-socials a {
  width: 42px;
  height: 42px;
  border-radius: 50%;
  background: #fff;
  display: flex;
  justify-content: center;
  align-items: center;
}
.ww-footer .footer-socials a i {
  color: #27b0d7;
  font-size: 1.2rem;
}

/* --- MIDDLE COL --- */
.ww-footer .footer-mid {
  flex: 1 1 200px;
}
.ww-footer .footer-col-title {
  font-size: 1.1rem;
  font-weight: 600;
  margin-bottom: 12px;
  margin-top:50px;
  
}
.ww-footer .footer-col ul {
  list-style: none;
  padding: 0;
  margin: 0;
}
.ww-footer .footer-col ul li {
  margin: 8px 0;
}
.ww-footer .footer-col ul li a {
  color: #ddd;
  text-decoration: none;
  transition: color 0.2s;
}
.ww-footer .footer-col ul li a:hover {
  color: #27b0d7;
}

/* --- RIGHT COL --- */
.ww-footer .footer-right {
  flex: 1 1 280px;
}
.ww-footer .addr-block {
  color: #ddd;
  font-weight: 400; /* ensure non-bold */
  margin-bottom: 14px;
  line-height: 1.6;
}
.ww-footer .phone-link {
  color: #27b0d7 !important;
  font-weight: 600;
  display: inline-block;
  margin-top: 6px;
}
.ww-footer .mail-row {
  display: flex;
  align-items: center;
  gap: 8px;
  margin-top: 12px;
}
.ww-footer .mail-row i {
  color: #fff;
}
.ww-footer .mail-row a {
  color: #ddd;
  font-weight: 400;
  text-decoration: none;
}

/* --- DIVIDER + COPYRIGHT --- */
.ww-footer .ww-divider {
  background: rgba(255,255,255,0.3);
  margin: 20px 0 12px;
}
.ww-footer .ww-bottom {
  display: flex;
  justify-content: space-between;
  flex-wrap: wrap;
  font-size: 0.9rem;
  padding: 0 30px 20px;
}
.ww-footer .custom-footer-links a {
  color: #ddd;
  margin-left: 10px;
  text-decoration: none;
  margin-top:10px !important;
  margin-left:85px !important;
}
.ww-footer .custom-footer-links a:hover {
  color: #27b0d7;
}

/* --- MOBILE --- */
@media (max-width: 900px) {
  .ww-footer .custom-footer-container {
    flex-direction: column;
    gap: 30px;
  }
  .ww-footer .ww-bottom {
    flex-direction: column;
    align-items: center;
    gap: 10px;
  }
}

</style>

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