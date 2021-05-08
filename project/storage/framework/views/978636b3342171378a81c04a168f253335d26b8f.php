<?php $__env->startSection('main-content'); ?>
<section id="page-section" class="page-main-block">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4><?php echo e($lic->title); ?></h4>
                <hr>
                <p>
                    <?php echo $lic->desc; ?>

                </p>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>