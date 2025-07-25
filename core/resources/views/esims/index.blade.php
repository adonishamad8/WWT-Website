@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Available eSIM Bundles</h2>

    @forelse ($plans as $plan)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $plan['bundle_marketing_name'] }}</h5>
                <p><strong>Data:</strong> {{ $plan['gprs_limit'] }} {{ $plan['data_unit'] }}</p>
                <p><strong>Validity:</strong> {{ $plan['validity'] }} days</p>
                <p><strong>Price:</strong> {{ $plan['reseller_retail_price'] }} {{ $plan['currency_code_list'][0] ?? '' }}</p>
                <p><strong>Country:</strong> {{ implode(', ', $plan['country_name']) }}</p>
                <a href="#" class="btn btn-primary">Buy Now</a>
            </div>
        </div>
    @empty
        <p>No bundles available.</p>
    @endforelse
</div>
@endsection
