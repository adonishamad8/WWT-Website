@extends('layouts.header')
@section('title'){!! $service->name !!}@stop
@section('description', '')
@section('keywords', '')
@section('content')
      <section class="breadcrumb-outer text-center">
         <div class="container">
            <div class="breadcrumb-content">
               <h2 class="white">Services</h2>
               <nav aria-label="breadcrumb">
                  <ul class="breadcrumb">
                     <li class="breadcrumb-item"><a href="/">Home</a></li>
                     <li class="breadcrumb-item active" aria-current="page">Services</li>
                  </ul>
               </nav>
            </div>
         </div>
         <!--<div class="overlay"></div>-->
      </section>
      <section class="faq">
         <div class="container">
            <div class="row flex-row-reverse">
               <div class="col-lg-9 col-12">
                  <div class="detail-content">
                     <div class="detail-image mar-bottom-15">
                        <img src="{{ $service->getFirstMediaUrl('service', 'thumb-large') }}" alt="{!! $service->name !!}" />
                     </div>
                     <div class="title mar-bottom-15">
                        <h2>{!! $service->name !!}</h2>
                     </div>
                     <div class="detail-desc">
                        <p>{!! $service->description !!}</p>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-12">
                  <div class="faq-sidebar">
                     <div class="sidebar-item">
                        <h3 class="mar-bottom-30">All Services</h3>
                        <ul class="sidebar-category">
						@foreach($services as $serv)
                           <li class="{{ route('front.service.show', [$serv->id, $serv->slug]) == url()->current() ? 'active' : '' }}"><a href="{{ route('front.service.show', [$serv->id, $serv->slug]) }}"><i class="fas fa-chevron-right"></i> {!! $serv->name !!}</a></li>
						@endforeach
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
@endsection