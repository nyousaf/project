<?php $__env->startSection('main-content'); ?>
 <section id="product-section" class="product-main-block">
  <div class="container">
     <div class="widget-block category-widget">
            <?php if(isset($authors) && count($authors)>0): ?>
              <h3 class="widget-heading text-info text-center">Authors</h3>
              <div class="row">
                <?php $__currentLoopData = $authors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="col-lg-2 cat-block">
                    <div class="widget-category-content">
                    <a href="<?php echo e(url('profile/'.$author->uni_id.'/'.str_slug($author->name,'-'))); ?>">
                      	<img src="<?php echo e(asset('images/user/'.$author->image)); ?>" class="img-fluid" alt="<?php echo e($author->name); ?>">
                        <h5 class="text-center d-block p-2"><?php echo e($author->name); ?></h5>
                      </a>
                    
                    </div>
                  </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
            <?php endif; ?>
          </div> 
  </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>