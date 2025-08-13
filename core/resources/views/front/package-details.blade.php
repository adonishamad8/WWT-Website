@extends('layouts.header')
@section('title'){!! $package->name !!}@stop
@section('description', '')
@section('keywords', '')
@section('content')
      <section class="breadcrumb-outer text-center">
         <div class="container">
            <div class="breadcrumb-content">
               <h2 class="white">{!! $package->name !!}</h2>
               <nav aria-label="breadcrumb">
                  <ul class="breadcrumb">
                     <li class="breadcrumb-item"><a href="/">Home</a></li>
                     <li class="breadcrumb-item"><a href="#">Packages</a></li>
                     <li class="breadcrumb-item active" aria-current="page">{!! $package->name !!}</li>
                  </ul>
               </nav>
            </div>
         </div>
          <!--<div class="overlay"></div>-->
      </section>
      <section class="flight-destinations bg-white">
         <div class="container">
            <div class="row">
               <div id="content" class="col-lg-8 col-12">
                  <div class="detail-content content-wrapper">
<div class="detail-info">
    <div class="detail-info-content clearfix">
        <h4 class="mar-0"><i class="fas fa-map-marker-alt"></i> {!! $package->country !!}</h4>

        <!-- NEW: title + price/date in a flex row -->
        <div class="package-header">
            <h2 class="package-title">{!! $package->name !!}</h2>

            <div class="package-meta">
                @if(!empty($package->price))
                    <div class="price">${!! $package->price !!} <span class="per">/ Pers</span></div>
                @endif

                @if(!empty($package->date))
                    <div class="duration">
                        <i class="fas fa-clock"></i> {!! $package->date !!}
                    </div>
                @endif
            </div>
        </div>
        <!-- /NEW -->
    </div>
</div>
                     <div class="gallery detail-box about-slider">
                        <div class="gallery-item">
							<img src="{{ $package->getFirstMediaUrl('package', 'thumb-large') }}" width="100%" alt="{!! $package->name !!}"/>
                        </div>
						@if($package->is_video == 1)
						<div class="gallery-item">
							<iframe width="100%" height="315" src="https://www.youtube.com/embed/{!! $package->video_link !!}"></iframe>
						</div>
						@endif
						@foreach($package->getMedia('gallery') as $media)
						<div class="gallery-item">
							<img src="{!! url($media->getUrl()) !!}" width="100%" alt="{!! $package->name !!}"/>
						</div>
						@endforeach
                     </div>
                     <div class="description flight-table mar-bottom-30">
                        <div class="detail-title">
                           <h3>Details</h3>
                        </div>
                        <div class="description-content blog-content">
                           <p>{!! $package->description !!}</p>
                        </div>
						@if(file_exists(public_path('uploads/'. $package->pdf_name. '.pdf')))
							<a target="_Blank" href="{{route('downloadBrochure', $package->pdf_name)}}" class="wt-btn wt-btn1 mar-top-30">Download Brochure</a>
						@endif
                     </div>
                  </div>
               </div>
               <div id="sidebar" class="col-lg-4 col-12">
                  <aside class="detail-sidebar sidebar-wrapper">
                     <div class="sidebar-item">
                        <form action="{{ route('front.sendpackage') }}" method="POST" class="filter-box form ajax-form">
						@csrf
							<input type="hidden" name="packagename" value="{!! $package->name !!}" />
							<input type="hidden" name="country" value="{!! $package->country !!}" />
							<input type="hidden" name="price" value="{!! $package->price !!}" />
                           <h3 class="white">Book Now</h3>
                           <div class="row">
                              <div class="col-sm-12">
                                 <div class="form-group">
                                    <label class="white">Full Name</label>
                                    <input id="fname" class="text-input" type="text" name="fname" placeholder="Full Name" required />
                                 </div>
                              </div>
							  <div class="col-sm-12">
                                 <div class="form-group">
                                    <label class="white">Email Address</label>
                                     <input id="email" class="text-input" type="email" name="email" placeholder="Email Address" required />
                                 </div>
                              </div>
							  <div class="col-sm-12">
                                 <div class="form-group">
                                    <label class="white">Phone</label>
                                     <input id="phone" class="text-input" type="text" name="phone" placeholder="Phone" required />
                                 </div>
                              </div>
                              <div class="col-lg-6 col-sm-6 col-12">
                                 <div class="form-group">
                                    <label class="white">Check In</label>
                                    <div class="input-box">
                                       <input id="date-range0" type="date" name="checkin" placeholder="yyyy-mm-dd" required />
                                    </div>
                                 </div>
                              </div>
                              <div class="col-lg-6 col-sm-6 col-12">
                                 <div class="form-group">
                                    <label class="white">Check Out</label>
                                    <div class="input-box">
                                       <input id="date-range0" type="date" name="checkout" placeholder="yyyy-mm-dd" required />
                                    </div>
                                 </div>
                              </div>
                              <div class="col-lg-6 col-sm-6 col-12">
                                 <div class="form-group">
                                    <label class="white">Adult</label>
                                    <div class="input-box">
                                       <i class="fas fa-user-plus"></i>
                                       <select name="adultNb" id="adultNb">
									      <option selected hidden>0</option>
                                          <option value="0">0</option>
                                          <option value="1">1</option>
                                          <option value="2">2</option>
                                          <option value="3">3</option>
                                          <option value="4">4</option>
                                          <option value="5">5</option>
                                       </select>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-lg-6 col-sm-6 col-12">
                                 <div class="form-group">
                                    <label class="white">Children</label>
                                    <div class="input-box">
										<i class="fas fa-user-plus"></i>
                                       <select name="childrenNb" id="childrenNb">
										  <option selected hidden>0</option>
									      <option value="0">0</option>
                                          <option value="1">1</option>
                                          <option value="2">2</option>
                                          <option value="3">3</option>
                                          <option value="4">4</option>
                                          <option value="5">5</option>
                                       </select>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-sm-12">
                                 <div class="form-group mar-top-15">
                                    <button class="btn-theme wt-btn-white wwt-btn" type="submit">Submit</button>
									<span id="responsemsg"></span>
                                 </div>
                              </div>
                           </div>
                        </form>
                     </div>
                  </aside>
               </div>
            </div>
         </div>
      </section>
@endsection
@section('scripts')
	   <script type="text/javascript">
	   $.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
	   
		$("form.ajax-form").submit(function(e){
			e.preventDefault();
			var token = $("input[name=_token]").val(); // The CSRF token
			var packagename = $("input[name=packagename]").val();
			var country = $("input[name=country]").val();
			var price = $("input[name=price]").val();
			var fname = $("input[name=fname]").val();
			var email = $("input[name=email]").val();
			var phone = $("input[name=phone]").val();
			var checkin = $("input[name=checkin]").val();
			var checkout = $("input[name=checkout]").val();
			var adultNb = $("select[name=adultNb]").val();
			var childrenNb = $("select[name=childrenNb]").val();

			$.ajax({
				type:'POST',
				url:'{{ route('front.sendpackage') }}',
				dataType: 'json',
				data:{_token: token, packagename:packagename, country:country, price:price, fname:fname, email:email, phone:phone, checkin:checkin, checkout:checkout, adultNb:adultNb, childrenNb:childrenNb},
				beforeSend: function() {
					$('#responsemsg').html('<img id="ajaxloader" src="{{asset("assets/images/loader.gif")}}"/>');     
				},
				success:function(data){
					$("form.ajax-form")[0].reset();
					$('#responsemsg').html(data.success);
				}
			});
		});
	  </script>
@endsection