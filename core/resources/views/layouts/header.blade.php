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
      <footer>
         <div class="footer-copyright">
            <div class="container">
               <div class="copyright-text">
                  <p class="mar-0 text-center">Copyright © 2025 All Rights Reserved.</p>
               </div>
            </div>
         </div>
      </footer>
      <div id="back-to-top">
         <a href="#"></a>
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
   </body>
</html>