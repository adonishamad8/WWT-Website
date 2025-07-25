@extends('layouts.header')
@section('title', 'Mice')
@section('description', '')
@section('keywords', '')
@section('content')
      <section class="breadcrumb-outer text-center">
         <div class="container">
            <div class="breadcrumb-content">
               <h2 class="white">Mice</h2>
               <nav aria-label="breadcrumb">
                  <ul class="breadcrumb">
                     <li class="breadcrumb-item"><a href="/">Home</a></li>
                     <li class="breadcrumb-item active" aria-current="page">Mice</li>
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
				@foreach($mices as $mice)
                  <div class="blog-single">
                     <div class="blog-image">
                        <img src="{{ $mice->getFirstMediaUrl('mice', 'thumb-large') }}" width="100%" alt="{!! $mice->name !!}" />
                     </div>
                     <div class="blog-content mar-bottom-30">
                        <h3 class="blog-title">{!! $mice->name !!}</h3>
                        <p>{!! $mice->description !!}</p>
                     </div>
                  </div>
				
				@endforeach
               </div>
            </div>
         </div>
      </section>
@endsection