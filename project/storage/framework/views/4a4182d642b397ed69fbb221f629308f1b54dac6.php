<?php $__env->startSection('content'); ?>
  <div class="admin-form-main-block mrg-t-40">
    <h4 class="admin-form-text">General Settings</h4>
    <?php if($general_settings): ?>
      <?php echo Form::model($general_settings, ['method' => 'PATCH', 'action' => ['SettingsController@general_update', $general_settings->id], 'files' => true]); ?>

        <div class="row admin-form-block z-depth-1">
          <div class="col-md-6">
            <div class="form-group<?php echo e($errors->has('w_name') ? ' has-error' : ''); ?>">
                <?php echo Form::label('w_name', 'Project Name'); ?>

                <p class="inline info"> - Please enter your website name</p>
                <?php echo Form::text('w_name', null, ['class' => 'form-control']); ?>

                <small class="text-danger"><?php echo e($errors->first('w_name')); ?></small>
            </div>
            <div class="form-group<?php echo e($errors->has('w_title') ? ' has-error' : ''); ?>">
              <?php echo Form::label('w_title', 'Project Title'); ?>

                <p class="inline info"> - Please enter your website Title</p>              
              <?php echo Form::text('w_title', null, ['class' => 'form-control']); ?>

              <small class="text-danger"><?php echo e($errors->first('w_title')); ?></small>
            </div>
            <div class="form-group<?php echo e($errors->has('w_email') ? ' has-error' : ''); ?>">
                <?php echo Form::label('w_email', 'Contact Email'); ?>

                <p class="inline info"> - Please enter your website email</p>
                <?php echo Form::email('w_email', null, ['class' => 'form-control', 'placeholder' => 'eg: foo@bar.com']); ?>

                <small class="text-danger"><?php echo e($errors->first('w_email')); ?></small>
            </div>
            <div class="form-group<?php echo e($errors->has('w_phone') ? ' has-error' : ''); ?>">
                <?php echo Form::label('w_phone', 'Contact Phone'); ?>

                <p class="inline info"> - Please enter your contact number</p>
                <?php echo Form::text('w_phone', null, ['class' => 'form-control', 'placeholder' => 'eg: foo@bar.com']); ?>

                <small class="text-danger"><?php echo e($errors->first('w_phone')); ?></small>
            </div>
            <div class="form-group<?php echo e($errors->has('w_address') ? ' has-error' : ''); ?>">
                <?php echo Form::label('w_address', 'Contact Address'); ?>

                <p class="inline info"> - Please enter your contact address</p>
                <?php echo Form::text('w_address', null, ['class' => 'form-control', 'placeholder' => 'eg: foo@bar.com']); ?>

                <small class="text-danger"><?php echo e($errors->first('w_address')); ?></small>
            </div>
            <div class="form-group<?php echo e($errors->has('w_time') ? ' has-error' : ''); ?>">
                <?php echo Form::label('w_time', 'Contact Time'); ?>

                <p class="inline info"> - Please enter your contact timing</p>
                <?php echo Form::text('w_time', null, ['class' => 'form-control', 'placeholder' => 'eg: foo@bar.com']); ?>

                <small class="text-danger"><?php echo e($errors->first('w_time')); ?></small>
            </div>
            <div class="form-group<?php echo e($errors->has('footer_text') ? ' has-error' : ''); ?>">
              <?php echo Form::label('footer_text', 'Footer Text'); ?>

              <p class="inline info"> - Please enter footer text</p>
              <?php echo Form::textarea('footer_text', null, ['class' => 'form-control']); ?>

              <small class="text-danger"><?php echo e($errors->first('footer_text')); ?></small>
            </div>
            <div class="form-group<?php echo e($errors->has('copyright') ? ' has-error' : ''); ?>">
              <?php echo Form::label('copyright', 'Copyright Text'); ?>

              <p class="inline info"> - Please enter copyright text</p>
              <?php echo Form::text('copyright', null, ['class' => 'form-control']); ?>

              <small class="text-danger"><?php echo e($errors->first('copyright')); ?></small>
            </div>
          </div>
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group<?php echo e($errors->has('logo') ? ' has-error' : ''); ?> input-file-block">
                  <?php echo Form::label('logo', 'Project Logo'); ?> - <p class="inline info">Size: 168x63</p>
                  <?php echo Form::file('logo', ['class' => 'input-file', 'id'=>'logo']); ?>

                  <label for="logo" class="btn btn-danger js-labelFile" data-toggle="tooltip" data-original-title="Project Logo">
                    <i class="icon fa fa-check"></i>
                    <span class="js-fileName">Choose a File</span>
                  </label>
                  <p class="info">Choose a logo</p>
                  <small class="text-danger"><?php echo e($errors->first('logo')); ?></small>
                </div>
              </div>
              <div class="col-md-6">
                <div class="image-block">
                  <img src="<?php echo e(asset('images/logo/' . $general_settings->logo)); ?>" class="img-responsive" alt="">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group<?php echo e($errors->has('favicon') ? ' has-error' : ''); ?> input-file-block">
                  <?php echo Form::label('favicon', 'Project favicon'); ?> - <p class="inline info">Size: 32x32</p>
                  <?php echo Form::file('favicon', ['class' => 'input-file', 'id'=>'favicon']); ?>

                  <label for="favicon" class="btn btn-danger js-labelFile" data-toggle="tooltip" data-original-title="Project Favicon">
                    <i class="icon fa fa-check"></i>
                    <span class="js-fileName">Choose a File</span>
                  </label>
                  <p class="info">Choose a favicon</p>
                  <small class="text-danger"><?php echo e($errors->first('favicon')); ?></small>
                </div>
              </div>
              <div class="col-md-6">
                <div class="image-block">
                  <img src="<?php echo e(asset('images/favicon/' . $general_settings->favicon)); ?>" class="img-responsive" alt="" width="50">
                </div>
              </div>
            </div>
            <div class="form-group<?php echo e($errors->has('fb_url') ? ' has-error' : ''); ?>">
                <?php echo Form::label('fb_url', 'Facebook ID'); ?>

                <p class="inline info"> - Please enter your facebook id</p>
                <?php echo Form::text('fb_url', null, ['class' => 'form-control', 'placeholder' => 'eg: www.facebook.com']); ?>

                <small class="text-danger"><?php echo e($errors->first('fb_url')); ?></small>
            </div>
            <div class="form-group<?php echo e($errors->has('twi_url') ? ' has-error' : ''); ?>">
                <?php echo Form::label('twi_url', 'Twitter ID'); ?>

                <p class="inline info"> - Please enter your twitter id</p>
                <?php echo Form::text('twi_url', null, ['class' => 'form-control', 'placeholder' => 'eg: www.facebook.com']); ?>

                <small class="text-danger"><?php echo e($errors->first('twi_url')); ?></small>
            </div>
            <div class="form-group<?php echo e($errors->has('utube_url') ? ' has-error' : ''); ?>">
                <?php echo Form::label('utube_url', 'Youtube ID'); ?>

                <p class="inline info"> - Please enter your youtube id</p>
                <?php echo Form::text('utube_url', null, ['class' => 'form-control', 'placeholder' => 'eg: www.facebook.com']); ?>

                <small class="text-danger"><?php echo e($errors->first('utube_url')); ?></small>
            </div>
            <div class="form-group<?php echo e($errors->has('link_url') ? ' has-error' : ''); ?>">
                <?php echo Form::label('link_url', 'Linkedin ID'); ?>

                <p class="inline info"> - Please enter your linkedin id</p>
                <?php echo Form::text('link_url', null, ['class' => 'form-control', 'placeholder' => 'eg: www.facebook.com']); ?>

                <small class="text-danger"><?php echo e($errors->first('link_url')); ?></small>
            </div>
            <div class="form-group<?php echo e($errors->has('g_url') ? ' has-error' : ''); ?>">
                <?php echo Form::label('g_url', 'Google Plus ID'); ?>

                <p class="inline info"> - Please enter your google id</p>
                <?php echo Form::text('g_url', null, ['class' => 'form-control', 'placeholder' => 'eg: www.facebook.com']); ?>

                <small class="text-danger"><?php echo e($errors->first('g_url')); ?></small>
            </div>
          </div>
          <div class="col-md-12"> 
            <button type="submit" class="btn btn-block btn-success">Save Settings</button>
            <div class="clear-both"></div>
          </div>
        </div>
      <?php echo Form::close(); ?>

    <?php endif; ?>
  </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>