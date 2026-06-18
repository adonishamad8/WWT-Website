<?php $__env->startSection('content'); ?>
<?php if($errors->all()): ?>
  <div class="alert alert-danger">
    <ul>
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <li><?php echo e($error); ?></li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
  </div>
<?php endif; ?>

<form id="form" class="form-horizontal" action="<?php echo e(route('events.update', $event->id)); ?>" method="POST" enctype="multipart/form-data" data-parsley-validate novalidate>
  <?php echo csrf_field(); ?>
  <?php echo method_field('PUT'); ?>
  <div class="row">
    <div class="col-xl-8">
      <div class="card-box">
        <h4 class="header-title m-t-0 m-b-30">Edit Event</h4>
        <!-- Title -->
        <div class="form-group row">
          <div class="col-md-1"></div>
          <label for="name" class="col-sm-2 col-form-label">Title</label>
          <div class="col-sm-8">
            <input type="text" name="name" id="name" class="form-control" value="<?php echo e($event->name); ?>" placeholder="Title" required>
          </div>
        </div>
        <!-- Image -->
        <div class="form-group row">
          <div class="col-md-1"></div>
          <label for="image" class="col-sm-2 col-form-label">Image</label>
          <div class="col-sm-8">
            <input type="file" name="image" class="form-control input-medium">
            <?php if($event->image): ?>
              <img src="<?php echo e(asset('uploads/'.$event->image)); ?>" height="80" class="mt-2">
            <?php endif; ?>
          </div>
        </div>
        <!-- Description -->
        <div class="form-group row">
          <div class="col-md-1"></div>
          <label for="DescEn" class="col-sm-2 col-form-label">Description</label>
          <div class="col-sm-8">
            <textarea id="editor-en" name="description"><?php echo e($event->description); ?></textarea>
          </div>
        </div>
        <!-- Category -->
        <div class="form-group row">
          <div class="col-md-1"></div>
          <label for="category" class="col-sm-2 col-form-label">Category</label>
          <div class="col-sm-8">
            <input type="text" name="category" class="form-control" value="<?php echo e($event->category); ?>" id="category" placeholder="Category">
          </div>
        </div>
        <!-- Link -->
        <div class="form-group row">
          <div class="col-md-1"></div>
          <label for="link" class="col-sm-2 col-form-label">Link</label>
          <div class="col-sm-8">
            <input type="text" name="link" class="form-control" value="<?php echo e($event->link); ?>" id="link" placeholder="Link">
          </div>
        </div>
        <!-- Date -->
        <div class="form-group row">
          <div class="col-md-1"></div>
          <label for="date" class="col-sm-2 col-form-label">Date</label>
          <div class="col-sm-8">
            <input type="date" name="date" class="form-control" value="<?php echo e($event->date); ?>" id="date">
          </div>
        </div>
        <!-- Video -->
        <div class="form-group row">
          <div class="col-md-1"></div>
          <label for="video_link" class="col-sm-2 col-form-label">Video Link</label>
          <div class="col-sm-8">
            <input type="text" name="video_link" class="form-control" value="<?php echo e($event->video_link); ?>" id="video_link" placeholder="Video Link">
          </div>
        </div>
        <!-- Meta Description -->
        <div class="form-group row">
          <div class="col-md-1"></div>
          <label for="meta_description" class="col-sm-2 col-form-label">Meta Description</label>
          <div class="col-sm-8">
            <textarea name="meta_description" class="form-control" rows="2"><?php echo e($event->meta_description); ?></textarea>
          </div>
        </div>
        <!-- FAQs -->
        <div class="form-group row">
          <div class="col-md-1"></div>
          <label class="col-sm-2 col-form-label">FAQs</label>
          <div class="col-sm-8">
            <div id="faq-container">
              <?php if($event->faqs): ?>
                <?php $__currentLoopData = $event->faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="faq-item row mb-2">
                    <div class="col-md-5">
                      <input type="text" name="faqs[<?php echo e($i); ?>][question]" value="<?php echo e($faq['question'] ?? ''); ?>" class="form-control" placeholder="Question">
                    </div>
                    <div class="col-md-5">
                      <input type="text" name="faqs[<?php echo e($i); ?>][answer]" value="<?php echo e($faq['answer'] ?? ''); ?>" class="form-control" placeholder="Answer">
                    </div>
                    <div class="col-md-2">
                      <button type="button" class="btn btn-danger remove-faq">×</button>
                    </div>
                  </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endif; ?>
            </div>
            <button type="button" id="add-faq" class="btn btn-secondary mt-2">Add FAQ</button>
          </div>
        </div>
        <!-- Tags -->
        <div class="form-group row">
          <div class="col-md-1"></div>
          <label for="tags" class="col-sm-2 col-form-label">SEO Keywords</label>
          <div class="col-sm-8">
            <input type="text" name="tag_list" class="form-control" data-role="tagsinput" value="<?php echo e(is_array($event->tags) ? implode(',', $event->tags) : ''); ?>">
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-4">
      <div class="card-box">
        <h4 class="header-title m-t-0 m-b-30">Action</h4>
        <button type="submit" class="btn btn-success btn-rounded w-md waves-effect waves-light m-b-5" style="width:100%;">UPDATE</button>
        <a href="<?php echo e(route('events.index')); ?>" class="btn btn-primary btn-rounded w-md waves-effect waves-light m-b-5" style="width:100%;">BACK</a>
      </div>
    </div>
  </div>
</form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
  jQuery(document).ready(function () {
    let faqIndex = <?php echo e($event->faqs ? count($event->faqs) : 1); ?>;
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.cmslayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u133514729/domains/worldwidetravel-lb.com/public_html/core/resources/views/admin/events/edit.blade.php ENDPATH**/ ?>