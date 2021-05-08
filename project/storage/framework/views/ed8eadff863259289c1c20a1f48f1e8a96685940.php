<?php $__env->startSection('main-content'); ?>
<!--  page banner -->
<section id="page-banner" class="banner-main-block" style="background-image: url(<?php echo e(asset('images/banner.jpg')); ?>)">    <div class="overlay-bg"></div>
    <div class="container">
      <div class="banner-block">
          <h2 class="banner-heading"></h2>
          <ol class="breadcrumb">
            <li><a href="<?php echo e(url('/')); ?>">Home</a></li>
            <li class="active">Error</li>
          </ol>
      </div>
    </div>
</section>
<!--  end page banner -->
<!-- about -->
<section id="about-section" class="about-main-block">
  <div class="container text-center">
    <div class="error-page">
        <div class="error-text">
            <h1 class="error-heading">404</h1>
            <h3>Sorry! Page Not Found !</h3>
            
            <a href="<?php echo e(url('/')); ?>" title="trevelinn" class="btn btn-primary">Go Back To Home Page</a>
        </div>
    </div>
    <!-- Error Page End-->
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>