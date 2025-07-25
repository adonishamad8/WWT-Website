@extends('layouts.header')
@section('title', 'News & Events')
@section('description', '')
@section('keywords', '')
@section('content')
<section class="breadcrumb-outer text-center">
   <div class="container">
      <div class="breadcrumb-content">
         <h2 class="white">News & Events</h2>
         <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
               <li class="breadcrumb-item"><a href="/">Home</a></li>
               <li class="breadcrumb-item active" aria-current="page">News & Events</li>
            </ul>
         </nav>
      </div>
   </div>
   <!--<div class="overlay"></div>-->
</section>

<section class="blog">
   <div class="container">
      <div class="row">
         @foreach ($events as $event)
           @if (!in_array($event->id, [35, 43]))  {{-- Hides the event with ID 35 --}}
               <div class="{{ $loop->index < 2 ? 'col-lg-6 col-sm-6' : 'col-lg-4 col-sm-12' }} col-12 mar-bottom-30">
                  <div class="grid">
                     <div class="grid-item">
                        <div class="grid-image">
                           <img src="{{ $event->getFirstMediaUrl('event', 'thumb-medium') }}" width="100%" alt="{{ $event->name }}"/>
                        </div>
                        <div class="gridblog-content">
                           <div class="date mar-bottom-15">
                              <i class="far fa-calendar-alt"></i> {{ \Carbon\Carbon::parse($event->date)->format('d M, Y') }}
                           </div>
                           <h3><a href="{{ route('front.event.show', [$event->id, $event->slug]) }}">{{ $event->name }}</a></h3>
                           <a href="{{ route('front.event.show', [$event->id, $event->slug]) }}" class="wt-btn wt-btn1">Read More</a>
                        </div>
                     </div>
                  </div>
               </div>
            @endif
         @endforeach
      </div>
   </div>
</section>
@endsection
