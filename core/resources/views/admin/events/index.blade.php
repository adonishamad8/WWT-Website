@extends('layouts.cmslayout')

{{-- SEO Meta Description for listing page --}}
@section('meta_description', 'Browse our latest events and news.')

{{-- FAQ Schema for all events' FAQs --}}
@section('schema')
@if($events->pluck('faqs')->flatten()->count())
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    @php
      $items = [];
      foreach($events as $ev) {
        foreach($ev->faqs ?? [] as $fq) {
          $items[] = $fq;
        }
      }
    @endphp
    @foreach($items as $i => $faq)
    {
      "@type": "Question",
      "name": "{{ addslashes($faq['question']) }}",
      "acceptedAnswer": { "@type": "Answer", "text": "{{ addslashes($faq['answer']) }}" }
    }@if($i < count($items)-1),@endif
    @endforeach
  ]
}
</script>
@endif
@endsection

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card-box table-responsive">
      <h4 class="m-t-0 header-title">News & Events</h4>
      <br>
      @if(session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
      @endif
      <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>Image</th>
            <th>Title</th>
            <th>Date</th>
            <th>Published</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        @foreach($events as $event)
          <tr>
            <td><img class="img-circle" src="{{ $event->getFirstMediaUrl('event', 'thumb') }}" width="50"></td>
            <td>{{ $event->name }}</td>
            <td>{{ $event->date }}</td>
            <td>{!! $event->published == 1 ? '<span class="badge badge-success">published</span>' : '<span class="badge badge-warning">unpublished</span>' !!}</td>
            <td>
              <a href="{{ route('events.edit', $event->id) }}" class="btn btn-info btn-xs webtn">Edit</a>
              <form onsubmit="return confirm('Are you sure you want to delete?');" class="d-inline-block" method="POST" action="{{ route('events.destroy', $event->id) }}">
                @csrf @method('delete')
                <button type="submit" class="btn btn-danger btn-xs webtn">Delete</button>
              </form>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
      <hr>
      <a href="{{ route('events.create') }}" class="btn btn-success btn-rounded w-md waves-effect waves-light m-b-5">Add New</a>
    </div>
  </div>
</div>
@endsection