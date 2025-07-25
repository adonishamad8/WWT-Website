@extends('layouts.header')
@section('title', 'Events')
@section('description', '')
@section('keywords', '')
@section('content')
		<section class="breadcrumb-outer text-center">
         <div class="container">
            <div class="breadcrumb-content">
               <h2 class="white">Events</h2>
               <nav aria-label="breadcrumb">
                  <ul class="breadcrumb">
                     <li class="breadcrumb-item"><a href="/">Home</a></li>
                     <li class="breadcrumb-item active" aria-current="page">Events</li>
                  </ul>
               </nav>
            </div>
         </div>
          <!--<div class="overlay"></div>-->
		</section>
		<section class="blogmain">
			<div class="container">
				<div class="row justify-content-md-center">
					<div class="col-md-10">
						<div class="blog-list">
						@foreach ($blogs as $blog)
							<div class="row mar-bottom-50">
								 <div class="col-lg-5 col-md-5 col-12 blog-height">
									<a href="{{ route('front.blog.show', [$blog->id, $blog->slug]) }}">
										<div class="blog-image">
										<img src="{{ $blog->getFirstMediaUrl('blog', 'thumb-large') }}" width="100%" alt="{!! $blog->name !!}">
										   <!--<a href="{{ route('front.blog.show', [$blog->id, $blog->slug]) }}" style="background-image: url({{ $blog->getFirstMediaUrl('blog', 'thumb-large') }})"></a>
										   <div class="b-date">
											  <a href="{{ route('front.blog.show', [$blog->id, $blog->slug]) }}" class="white"><strong>{{ Carbon\Carbon::parse($blog->date)->format('d') }}</strong> {{ Carbon\Carbon::parse($blog->date)->format('M, Y') }}</a>
										   </div>-->
										</div>
									</a>
								 </div>
								 <div class="col-lg-7 col-md-7 col-12">
									<a href="{{ route('front.blog.show', [$blog->id, $blog->slug]) }}">
										<div class="blog-content">
										   <h3 class="blog-title">{!! $blog->name !!}</h3>
										   <p>{!! $blog->ShortDescription !!}</p>
										   <div class="para-content">
											  <!--<span class="mar-right-20"><a href="#" class="tag"><i class="far fa-calendar-alt"></i> {{ Carbon\Carbon::parse($blog->date)->format('d M, Y') }}</a></span>-->
											  <a href="#" class="tag"><i class="fa fa-tag mar-right-5"></i>{!! $blog->category !!} </a>&nbsp;&nbsp;
											  <span class="mar-right-20"><a href="#"><i class="fas fa-map-marker-alt"></i> {!! $blog->location !!}</a></span>
										   </div>
										</div>
									</a>
								 </div>
							</div>
						@endforeach
						</div>
					</div>
				</div>
			</div>
		</section>
@endsection
