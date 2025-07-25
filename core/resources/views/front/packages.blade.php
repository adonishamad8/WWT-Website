@extends('layouts.header')
@section('title'){!! $category->name !!}@stop
@section('description', '')
@section('keywords', '')
@section('content')
      <section class="breadcrumb-outer text-center">
         <div class="container">
            <div class="breadcrumb-content">
               <h2 class="white">{!! $category->name !!}</h2>
               <nav aria-label="breadcrumb">
                  <ul class="breadcrumb">
                     <li class="breadcrumb-item"><a href="/">Home</a></li>
                     <li class="breadcrumb-item active" aria-current="page">{!! $category->name !!}</li>
                  </ul>
               </nav>
            </div>
         </div>
          <!--<div class="overlay"></div>-->
      </section>
      <section class="list">
         <div class="container">
            <div class="row">
               <div class="col-lg-12 col-12">
                  <div class="trend-box">
                     <div class="row">
					@foreach($category->packages as $package)
						@if($package->published == 1)
                        <div class="col-lg-4 col-md-4 col-12 mar-bottom-30">
                           <div class="trend-item">
						   <a href="{{ route('front.package.show', [$package->id, $package->slug]) }}">
                              <div class="trend-image">
                                 <img src="{{ $package->getFirstMediaUrl('package', 'thumb-medium') }}" width="100%" alt="{!! $package->name !!}" />
								@if($package->price != NULL || $package->price != '')
                                 <div class="trend-price">
                                    <p class="price"><span>{!! $package->price !!}</span> / Pers </p>
                                 </div>
								@endif
                              </div>
							</a>
                              <div class="trend-content">
                                 <p><i class="fas fa-map-marker-alt"></i> {!! $package->country !!}  @if($package->date != NULL || $package->date != '')<span class="duration-night"><i class="fas fa-clock"></i> {!! $package->date !!}</span>@endif</p>
                                 <h4><a href="{{ route('front.package.show', [$package->id, $package->slug]) }}">{!! $package->name !!}</a></h4>
                              </div>
                           </div>
                        </div>
						@endif
					@endforeach
                        <!--<div class="col-12">
                           <div class="blog-button text-center">
                              <a href="#" class="wt-btn wt-btn1">Load More</a>
                           </div>
                        </div>-->
                     </div>
                  </div>
               </div>
              
            </div>
         </div>
      </section>
@endsection