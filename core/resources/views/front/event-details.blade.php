@extends('layouts.header')
@section('title'){!! $event->name !!}@stop
@section('description', '')
@section('keywords', '')
@section('content')
      <section class="breadcrumb-outer text-center">
         <div class="container">
            <div class="breadcrumb-content">
               <h2 class="white">{!! $event->name !!}</h2>
               <nav aria-label="breadcrumb">
                  <ul class="breadcrumb">
                     <li class="breadcrumb-item"><a href="/">Home</a></li>
                     <li class="breadcrumb-item"><a href="{!! route('front.events') !!}">News & Events</a></li>
                     <li class="breadcrumb-item active" aria-current="page">{!! $event->name !!}</li>
                  </ul>
               </nav>
            </div>
         </div>
          <!--<div class="overlay"></div>-->
      </section>
      <section class="blogmain blog-fullwidth">
         <div class="container">
            <div class="row">
               <div class="col-lg-10 offset-lg-1">
                  <div class="blog-single">
					<div class="gallery detail-box about-slider">
                        <div class="gallery-item">
							<img src="{{ $event->getFirstMediaUrl('event', 'thumb-medium') }}" width ="100%" alt="{!! $event->name !!}"/>
                        </div>
						@if($event->is_video == 1)
						<div class="gallery-item">
							<iframe width="100%" height="315" src="https://www.youtube.com/embed/{!! $event->video_link !!}"></iframe>
						</div>
						@endif
						@foreach($event->getMedia('gallery') as $media)
						<div class="gallery-item">
							<img src="{!! url($media->getUrl()) !!}" width="100%" alt="{!! $event->name !!}"/>
						</div>
						@endforeach
                     </div>
                     <div class="blog-content mar-bottom-30">
                        <h3 class="blog-title">{!! $event->name !!}</h3>
                        <div class="para-content pad-bottom-20">
                            <span class="mar-right-20"><a class="tag"><i class="far fa-calendar-alt"></i> &nbsp;{{ Carbon\Carbon::parse($event->date)->format('d M, Y') }}</a></span>
                            <span class="mar-right-20"><a class="tag"><i class="fa fa-tag mar-right-5"></i> {!! $event->category !!}</a></span>
							@if($event->link != NULL || $event->link != '')
                            <span class="mar-right-20"><a target="_Blank" href="{!! $event->link !!}" class="tag"><i class="fa fa-link"></i> Source Link</a></span>
							@endif
                        </div>
                        <p>{!! $event->description !!}</p>
                     </div>
                    <!-- <div class="blog-next mar-bottom-30">
                        <a href="#" class="pull-left">
                           <div class="prev">
                              <i class="fas fa-long-arrow-left white"></i>
                              <p class="white">Previous Post</p>
                              <p class="white">Blog Title 1</p>
                           </div>
                        </a>
                        <a href="#" class="pull-right">
							<div class="next">
								<i class="fas fa-long-arrow-right white"></i>
								<p class="white">Previous Post</p>
								<p class="white">Blog Title 2</p>
							</div>
                        </a>
                     </div>-->
                  </div>
               </div>
            </div>
         </div>
      </section>
@endsection