@extends('layouts.cmslayout')

@section('content')
@if($errors->all())
  <div class="alert alert-danger">
    <ul>
    @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
    </ul>
  </div>
@endif

<form id="form" class="form-horizontal" action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data" data-parsley-validate novalidate>
  @csrf
  <div class="row">
    <div class="col-xl-8">
      <div class="card-box">
        <h4 class="header-title m-t-0 m-b-30">Create Event</h4>
        <!-- existing fields -->
        <!-- Title -->
        <div class="form-group row">
          <div class="col-md-1"></div>
          <label for="name" class="col-sm-2 col-form-label">Title</label>
          <div class="col-sm-8">
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" placeholder="Title" required>
          </div>
        </div>
        <!-- Image -->
        <div class="form-group row">
          <div class="col-md-1"></div>
          <label for="image" class="col-sm-2 col-form-label">Image (1200x800px)</label>
          <div class="col-sm-8">
            <input type="file" name="image" class="form-control input-medium">
          </div>
        </div>
        <!-- Description -->
        <div class="form-group row">
          <div class="col-md-1"></div>
          <label for="DescEn" class="col-sm-2 col-form-label">Description</label>
          <div class="col-sm-8">
            <textarea id="editor-en" name="description">{{ old('description') }}</textarea>
          </div>
        </div>
        <!-- Category -->
        <div class="form-group row">
          <div class="col-md-1"></div>
          <label for="category" class="col-sm-2 col-form-label">Category</label>
          <div class="col-sm-8">
            <input type="text" name="category" class="form-control" value="{{ old('category') }}" id="category" placeholder="Category">
          </div>
        </div>
        <!-- Link -->
        <div class="form-group row">
          <div class="col-md-1"></div>
          <label for="link" class="col-sm-2 col-form-label">Link</label>
          <div class="col-sm-8">
            <input type="text" name="link" class="form-control" value="{{ old('link') }}" id="link" placeholder="Link">
          </div>
        </div>
        <!-- Date -->
        <div class="form-group row">
          <div class="col-md-1"></div>
          <label for="date" class="col-sm-2 col-form-label">Date</label>
          <div class="col-sm-8">
            <input type="date" name="date" class="form-control" value="{{ old('date') }}" id="date">
          </div>
        </div>
        <!-- Is Video -->
        <div class="form-group row">
          <div class="col-md-1"></div>
          <label for="is_video" class="col-sm-2 col-form-label">Is Video</label>
          <div class="col-sm-1">
            <div class="checkbox checkbox-primary">
              <input id="is_video" type="checkbox" name="is_video" value="1">
              <label for="is_video"></label>
            </div>
          </div>
        </div>
        <!-- Video Link -->
        <div class="form-group row d-none" id="video_cat_div">
          <div class="col-md-1"></div>
          <label for="video_link" class="col-sm-2 col-form-label">Video Link</label>
          <div class="col-sm-8">
            <input type="text" name="video_link" class="form-control" id="video_link" placeholder="Video Link">
          </div>
        </div>

        <!-- NEW: SEO Meta Description -->
        <div class="form-group row">
          <div class="col-md-1"></div>
          <label for="meta_description" class="col-sm-2 col-form-label">Meta Description</label>
          <div class="col-sm-8">
            <textarea id="meta_description" name="meta_description" class="form-control" rows="2" placeholder="Short summary for SEO…">{{ old('meta_description') }}</textarea>
          </div>
        </div>
        <!-- NEW: FAQ Repeater -->
        <div class="form-group row">
          <div class="col-md-1"></div>
          <label class="col-sm-2 col-form-label">FAQs</label>
          <div class="col-sm-8">
            <div id="faq-container">
              <div class="faq-item row mb-2">
                <div class="col-md-5">
                  <input type="text" name="faqs[0][question]" class="form-control" placeholder="Question">
                </div>
                <div class="col-md-5">
                  <input type="text" name="faqs[0][answer]" class="form-control" placeholder="Answer">
                </div>
                <div class="col-md-2">
                  <button type="button" class="btn btn-danger remove-faq">×</button>
                </div>
              </div>
            </div>
            <button type="button" id="add-faq" class="btn btn-secondary mt-2">Add FAQ</button>
          </div>
        </div>

        <!-- SEO Keywords -->
        <div class="form-group row">
          <div class="col-md-1"></div>
          <label for="tags" class="col-sm-2 col-form-label">SEO Keywords</label>
          <div class="col-sm-8">
            <input type="text" name="tag_list" data-role="tagsinput" placeholder="Add Keywords">
          </div>
        </div>
        <!-- Published -->
        <div class="form-group row">
          <div class="col-md-1"></div>
          <label for="published" class="col-sm-2 col-form-label">Published</label>
          <div class="col-sm-1">
            <label class="switch">
              <input type="checkbox" name="published" class="form-control" value="1">
              <span class="slider round"></span>
            </label>
          </div>
        </div>
        <!-- Photo Gallery -->
        <div class="form-group row">
          <div class="col-md-1"></div>
          <label for="gallery" class="col-sm-2 col-form-label">Photo Gallery</label>
          <div class="col-sm-8">
            <div class="needsclick dropzone" id="gallery-dropzone"></div>
          </div>
        </div>

      </div>
    </div>
 <div class="col-xl-4">
  <div class="card-box">
    <h4 class="header-title m-t-0 m-b-30">Action</h4>
    <button type="submit" class="btn btn-success btn-rounded w-md waves-effect waves-light m-b-5" style="width:100%;">
      CREATE
    </button>
    <a href="{{ route('events.index') }}" class="btn btn-primary btn-rounded w-md waves-effect waves-light m-b-5" style="width:100%;">
      BACK
    </a>
  </div>
</div>
</form>
@endsection

@section('scripts')
<script>
  jQuery(document).ready(function () {
    // remove image logic...
  });
  $(document).ready(function(){
    $('#is_video').change(function(){
      var is_checked=$('#is_video').prop('checked');
      if(is_checked){
        $('#video_cat_div').removeClass('d-none');
        $('#video_link').prop('required', true);
      } else {
        $('#video_cat_div').addClass('d-none');
        $('#video_link').prop('required', false);
      }
    });
    // FAQ repeater script
    let faqIndex = 1;
    const container = document.getElementById('faq-container');
    $('#add-faq').click(() => {
      const tpl = container.querySelector('.faq-item').cloneNode(true);
      tpl.querySelectorAll('input').forEach(input => {
        input.name = input.name.replace(/\d+/, faqIndex);
        input.value = '';
      });
      container.appendChild(tpl);
      faqIndex++;
    });
    container.addEventListener('click', e => {
      if(e.target.classList.contains('remove-faq')){
        const items = container.querySelectorAll('.faq-item');
        if(items.length>1) e.target.closest('.faq-item').remove();
      }
    });
  });
</script>
@endsection