<?php $__env->startSection('main-content'); ?>
<section id="page-section" class="page-main-block">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3><i class='fa fa-question-circle'></i> FAQs</h3>
                <hr>    
                <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="card">
                            <div class="card-header" id="headingOne">
                              <h5 class="mb-0">
                                <button class="btn btn-link text-dark" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                 <i class="fa fa-question-circle"></i> <?php echo e($faq->title); ?>

                                </button>
                              </h5>
                            </div>
                        
                            <div id="collapseOne" class="collapse hide" aria-labelledby="headingOne" data-parent="#accordion">
                              <div class="card-body">
                                    <?php echo $faq->desc; ?>

                              </div>
                            </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>