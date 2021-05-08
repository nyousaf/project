<?php $__env->startSection('main-content'); ?>
 <section id="product-section" class="product-main-block">
  <div class="container">
     <div class="widget-block category-widget">
            <?php if(isset($category) && count($category)>0): ?>
              <h2 class="widget-heading text-info text-center">Categories</h2>
              <div class="row">
                <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="col-lg-4 cat-block">
                    <div class="widget-category-content">
                      <a href="<?php echo e(url('category/'.$cat->slug)); ?>" title="<?php echo e($cat->title); ?>">  <img src="<?php echo e(asset('images/category/'.$cat->image)); ?>" class="img-fluid" alt="<?php echo e($cat->title); ?>">
                        <h5 class="text-center d-block p-2"><?php echo e($cat->title); ?></h5>
                      </a>
                    
                    </div>
                  </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
            <?php endif; ?>
          </div> 
  </div>
</section>
<?php if(isset($ad_settings)): ?>
<?php if($ad_settings->catagory_flag): ?>
 <section id="cat-section" class="cat-main-block">
    <div class="container-fluid" >
<div data-id='<?php echo e($ad_settings->Embedd_code); ?>' style="width: 100%"
  class='sstk_widget'><a href='http://affiliate.shutterstock.com' target='_blank'
  style='position: absolute;bottom: 0px; line-height: 40px; text-decoration: none;color: #333333; font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;font-size: 12px;'>
</a>
</div>
</div>
<?php endif; ?>
<?php endif; ?>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-scripts'); ?>
<script>
 

window._wdata = window._wdata || [];_wdata.push({widget_id: $(".sstk_widget").data("id"), cdn_prefix: '//d3qrz9uuaxc8ej.cloudfront.net', width: '100%', height: '660', src: '//widget.shutterstock.com/widget/'
  +$(".sstk_widget").data("id"), border: false, url: document.URL});(function () {if (typeof (widget) !== 'undefined') return;var nwjs = document.createElement('script'); nwjs.type = 'text/javascript'; nwjs.async = true;nwjs.id = 'widget_script';nwjs.src = '//widget.shutterstock.com/content/js/embed_widget.js';var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(nwjs, s);})();

  

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>