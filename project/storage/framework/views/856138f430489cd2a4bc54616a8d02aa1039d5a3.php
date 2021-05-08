<?php $__env->startSection('content'); ?>
  <div class="admin-form-main-block mrg-t-40">
    <?php if($general_settings): ?>
      <?php echo Form::model($general_settings, ['method' => 'PATCH', 'action' => ['SettingsController@general_update', $general_settings->id], 'files' => true]); ?>

        <div class="row admin-form-block z-depth-1">
          <div class="col-md-8">  
            <h6 class="admin-form-text" style="margin-bottom: 20px;">General Settings</h6>
          </div>  
          <div class="col-md-6">
            <div class="form-group<?php echo e($errors->has('w_name') ? ' has-error' : ''); ?>">
                <?php echo Form::label('w_name', 'Website Name'); ?>

                <p class="inline info"> - Please Enter Your Website Name</p>
                <?php echo Form::text('w_name', null, ['class' => 'form-control']); ?>

                <small class="text-danger"><?php echo e($errors->first('w_name')); ?></small>
            </div>
            <div class="form-group<?php echo e($errors->has('w_title') ? ' has-error' : ''); ?>">
              <?php echo Form::label('w_title', 'Website Title'); ?>

                <p class="inline info"> - Please Enter Your Website Title</p>              
              <?php echo Form::text('w_title', null, ['class' => 'form-control']); ?>

              <small class="text-danger"><?php echo e($errors->first('w_title')); ?></small>
            </div>            <div class="form-group<?php echo e($errors->has('w_email') ? ' has-error' : ''); ?>">
                <?php echo Form::label('w_email', 'Contact Email'); ?>

                <p class="inline info"> - Please Enter Your Website Email</p>
                <?php echo Form::email('w_email', null, ['class' => 'form-control', 'placeholder' => 'eg: foo@bar.com']); ?>

                <small class="text-danger"><?php echo e($errors->first('w_email')); ?></small>
            </div>
            <div class="form-group<?php echo e($errors->has('w_phone') ? ' has-error' : ''); ?>">
                <?php echo Form::label('w_phone', 'Contact Phone'); ?>

                <p class="inline info"> - Please Enter Your Contact Number</p>
                <?php echo Form::text('w_phone', null, ['class' => 'form-control', 'placeholder' => 'eg: foo@bar.com']); ?>

                <small class="text-danger"><?php echo e($errors->first('w_phone')); ?></small>
            </div>
            <div class="form-group<?php echo e($errors->has('w_time') ? ' has-error' : ''); ?>">
                <?php echo Form::label('w_time', 'Contact Time'); ?>

                <p class="inline info"> - Please Enter Your Contact Timing</p>
                <?php echo Form::text('w_time', null, ['class' => 'form-control', 'placeholder' => 'eg: foo@bar.com']); ?>

                <small class="text-danger"><?php echo e($errors->first('w_time')); ?></small>
            </div>
            <div class="form-group<?php echo e($errors->has('w_address') ? ' has-error' : ''); ?>">
                <?php echo Form::label('w_address', 'Contact Address'); ?>

                <p class="inline info"> - Please Enter Your Contact Address</p>
                <?php echo Form::textarea('w_address', null, ['class' => 'form-control', 'placeholder' => 'eg: foo@bar.com', 'rows' => 5]); ?>

                <small class="text-danger"><?php echo e($errors->first('w_address')); ?></small>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group<?php echo e($errors->has('watermark_img') ? ' has-error' : ''); ?> input-file-block">
                  <?php echo Form::label('watermark_img', 'Watermark Image'); ?> - <p class="inline info">Size: 168x63</p>
                  <?php echo Form::file('watermark_img', ['class' => 'input-file', 'id'=>'watermark_img']); ?>

                  <label for="watermark_img" class="btn btn-danger js-labelFile" data-toggle="tooltip" data-original-title="Choose a watermark image">
                    <i class="icon fa fa-check"></i>
                    <span class="js-fileName">Choose a File</span>
                  </label>
                  <p class="info">Choose a watermark image</p>
                  <small class="text-danger"><?php echo e($errors->first('watermark_img')); ?></small>
                </div>
              </div>

              <div class="col-md-6">
                
                  <div class="image-block">
                    <img src="<?php echo e(asset('images/logo/' . $general_settings->watermark_img)); ?>" class="img-responsive" alt="">
                  </div>
                
              </div>
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
                  <p class="info">Choose a Logo</p>
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
                  <?php echo Form::label('favicon', 'Project Favicon'); ?> - <p class="inline info">Size: 32x32</p>
                  <?php echo Form::file('favicon', ['class' => 'input-file', 'id'=>'favicon']); ?>

                  <label for="favicon" class="btn btn-danger js-labelFile" data-toggle="tooltip" data-original-title="Project Favicon">
                    <i class="icon fa fa-check"></i>
                    <span class="js-fileName">Choose a File</span>
                  </label>
                  <p class="info">Choose a Favicon</p>
                  <small class="text-danger"><?php echo e($errors->first('favicon')); ?></small>
                </div>
              </div>
              <div class="col-md-6">
                <div class="image-block">
                  <img src="<?php echo e(asset('images/favicon/' . $general_settings->favicon)); ?>" class="img-responsive" alt="" width="50">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group<?php echo e($errors->has('preloader') ? ' has-error' : ''); ?> input-file-block">
                  <?php echo Form::label('preloader', 'Website Preloader'); ?> - <p class="inline info">Max Size: 250*92</p>
                  <?php echo Form::file('preloader', ['class' => 'input-file', 'id'=>'preloader']); ?>

                  <label for="preloader" class="btn btn-danger js-labelFile" data-toggle="tooltip" data-original-title="Website Preloader">
                    <i class="icon fa fa-check"></i>
                    <span class="js-fileName">Choose a File</span>
                  </label>
                  <p class="info">Choose a Preloader</p>
                  <small class="text-danger"><?php echo e($errors->first('preloader')); ?></small>
                </div>
              </div>
              <div class="col-md-6">
                <div class="image-block">
                  <img src="<?php echo e(asset('images/'.$general_settings->preloader)); ?>" class="img-responsive" alt="" width="150">
                </div>
              </div>
            </div>
            <div class="form-group<?php echo e($errors->has('is_preloader') ? ' has-error' : ''); ?> switch-main-block">
              <div class="row">
                <div class="col-xs-4">
                  <?php echo Form::label('is_preloader', 'Preloader'); ?>

                </div>
                <div class="col-xs-5 pad-0">
                  <label class="switch">                
                    <?php echo Form::checkbox('is_preloader', 1, null, ['class' => 'checkbox-switch']); ?>

                    <span class="slider round"></span>
                  </label>
                </div>
              </div>
              <div class="col-xs-12">
                <small class="text-danger"><?php echo e($errors->first('is_preloader')); ?></small>
              </div>
            </div>
            <div class="form-group<?php echo e($errors->has('is_gotop') ? ' has-error' : ''); ?> switch-main-block">
              <div class="row">
                <div class="col-xs-4">
                  <?php echo Form::label('is_gotop', 'Go To Top'); ?>

                </div>
                <div class="col-xs-5 pad-0">
                  <label class="switch">                
                    <?php echo Form::checkbox('is_gotop', 1, null, ['class' => 'checkbox-switch']); ?>

                    <span class="slider round"></span>
                  </label>
                </div>
              </div>
              <div class="col-xs-12">
                <small class="text-danger"><?php echo e($errors->first('is_gotop')); ?></small>
              </div>
            </div>
            <div class="form-group<?php echo e($errors->has('inspect') ? ' has-error' : ''); ?> switch-main-block">
              <div class="row">
                <div class="col-xs-4">
                  <?php echo Form::label('inspect', 'Inspect Element Disable'); ?>

                </div>
                <div class="col-xs-5 pad-0">
                  <label class="switch">                
                    <?php echo Form::checkbox('inspect', 1, null, ['class' => 'checkbox-switch']); ?>

                    <span class="slider round"></span>
                  </label>
                </div>
              </div>
              <div class="col-xs-12">
                <small class="text-danger"><?php echo e($errors->first('inspect')); ?></small>
              </div>
            </div>
            <div class="form-group<?php echo e($errors->has('right_click') ? ' has-error' : ''); ?> switch-main-block">
              <div class="row">
                <div class="col-xs-4">
                  <?php echo Form::label('right_click', 'Right Click Disable'); ?>

                </div>
                <div class="col-xs-5 pad-0">
                  <label class="switch">                
                    <?php echo Form::checkbox('right_click', 1, null, ['class' => 'checkbox-switch']); ?>

                    <span class="slider round"></span>
                  </label>
                </div>
              </div>
              <div class="col-xs-12">
                <small class="text-danger"><?php echo e($errors->first('right_click')); ?></small>
              </div>
            </div>
            <div class="form-group<?php echo e($errors->has('is_category') ? ' has-error' : ''); ?> switch-main-block">
              <div class="row">
                <div class="col-xs-4">
                  <?php echo Form::label('is_category', 'Home Category'); ?>

                </div>
                <div class="col-xs-5 pad-0">
                  <label class="switch">                
                    <?php echo Form::checkbox('is_category', 1, null, ['class' => 'checkbox-switch']); ?>

                    <span class="slider round"></span>
                  </label>
                </div>
              </div>
              <div class="col-xs-12">
                <small class="text-danger"><?php echo e($errors->first('is_category')); ?></small>
              </div>
            </div> 
             <div class="form-group<?php echo e($errors->has('is_blog') ? ' has-error' : ''); ?> switch-main-block">
              <div class="row">
                <div class="col-xs-4">
                  <?php echo Form::label('is_blog', 'Blog'); ?>

                </div>
                <div class="col-xs-5 pad-0">
                  <label class="switch">                
                    <?php echo Form::checkbox('is_blog', 1, null, ['class' => 'checkbox-switch']); ?>

                    <span class="slider round"></span>
                  </label>
                </div>
              </div>
              <div class="col-xs-12">
                <small class="text-danger"><?php echo e($errors->first('is_blog')); ?></small>
              </div>
            </div>
            <div class="bootstrap-checkbox form-group<?php echo e($errors->has('sidebar_left') ? ' has-error' : ''); ?> sidebarleft">
              <div class="row">
                <div class="col-xs-4">
                  <?php echo Form::label('sidebar_left', 'Sidebar'); ?>

                </div>
                <div class="col-xs-5 pad-0">
                  <div class="make-switch">
                    <?php echo Form::checkbox('blog_left', 1, ($general->sidebar_left == 1 ? true : false), ['class' => 'bootswitch', "data-on-text"=>"Left", "data-off-text"=>"Right", "data-size"=>"small"]); ?>

                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <small class="text-danger"><?php echo e($errors->first('sidebar_left')); ?></small>
              </div>
            </div>      
          </div>
          <div class="col-md-12"> 
            <button type="submit" class="btn btn-block btn-success">Save Settings</button>
            <div class="clear-both"></div>
          </div>
        </div>
        <div class="row admin-form-block z-depth-1">
          <h6 class="admin-form-text" style="margin-bottom: 20px;">SEO Settings</h6>
          <div class="col-md-6">
            <div class="form-group<?php echo e($errors->has('keywords') ? ' has-error' : ''); ?>">
                <?php echo Form::label('keywords', 'Website Keywords'); ?>

                <p class="inline info"> - Please Enter Keywords for SEO</p>
                <?php echo Form::text('keywords', null, ['class' => 'form-control']); ?>

                <small class="text-danger"><?php echo e($errors->first('keywords')); ?></small>
            </div>
            <div class="form-group<?php echo e($errors->has('desc') ? ' has-error' : ''); ?>">
                <?php echo Form::label('desc', 'Website Description'); ?>

                <p class="inline info"> - Please Enter Website Description</p>
                <?php echo Form::textarea('desc', null, ['class' => 'form-control', 'rows' => 5]); ?>

                <small class="text-danger"><?php echo e($errors->first('desc')); ?></small>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group<?php echo e($errors->has('google_id') ? ' has-error' : ''); ?>">
              <?php echo Form::label('google_id', 'Google Analytics ID'); ?>

              <?php echo Form::text('google_id', null, ['class' => 'form-control']); ?>

              <small class="text-danger"><?php echo e($errors->first('google_id')); ?></small>
            </div>
            <div class="form-group<?php echo e($errors->has('fb_pixel') ? ' has-error' : ''); ?>">
                <?php echo Form::label('fb_pixel', 'Facebook Pixel ID'); ?>

                <?php echo Form::text('fb_pixel', null, ['class' => 'form-control']); ?>

                <small class="text-danger"><?php echo e($errors->first('fb_pixel')); ?></small>
            </div>
          </div>
          <div class="col-md-12"> 
            <button type="submit" class="btn btn-block btn-success">Save Settings</button>
            <div class="clear-both"></div>
          </div>
        </div>
        <div class="row admin-form-block z-depth-1">
          <div class="col-md-8">  
            <h6 class="admin-form-text" style="margin-bottom: 20px;">Footer Settings</h6>
          </div>          
          <div class="col-md-4" style="text-transform: uppercase;"> 
            <div class="bootstrap-checkbox form-group<?php echo e($errors->has('footer_layout') ? ' has-error' : ''); ?>">
              <div class="row">
                <div class="col-md-7">
                  <h5 class="bootstrap-switch-label">Footer Layout</h5>
                </div>
                <div class="col-md-5 pad-0">
                  <div class="make-switch">
                    <?php echo Form::checkbox('footer_layout', 1, ($general_settings->footer_layout == 1 ? true : false), ['class' => 'bootswitch', 'id' => 'FooterCheckBox', "data-on-text"=>"Layout 1", "data-off-text"=>"Layout 2", "data-size"=>"small"]); ?>

                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <small class="text-danger"><?php echo e($errors->first('footer_layout')); ?></small>
              </div>
            </div>
          </div>
          <div class="col-md-6"> 
            <div class="row">
              <div class="col-md-6">
                <div class="form-group<?php echo e($errors->has('footer_logo') ? ' has-error' : ''); ?> input-file-block">
                  <?php echo Form::label('footer_logo', 'Footer Logo'); ?> - <p class="inline info">Size: 168x63</p>
                  <?php echo Form::file('footer_logo', ['class' => 'input-file', 'id'=>'footer_logo']); ?>

                  <label for="footer_logo" class="btn btn-danger js-labelFile" data-toggle="tooltip" data-original-title="Footer Logo">
                    <i class="icon fa fa-check"></i>
                    <span class="js-fileName">Choose a File</span>
                  </label>
                  <p class="info">Choose a logo</p>
                  <small class="text-danger"><?php echo e($errors->first('footer_logo')); ?></small>
                </div>
              </div>
              <div class="col-md-6">
                <div class="image-block">
                  <img src="<?php echo e(asset('images/' . $general_settings->footer_logo)); ?>" class="img-responsive" alt="">
                </div>
              </div>
            </div>
            <div class="form-group<?php echo e($errors->has('footer_text') ? ' has-error' : ''); ?>">
              <?php echo Form::label('footer_text', 'Footer and Top Text'); ?>

              <p class="inline info"> - Please Enter Footer and Top 'About' Text</p>
              <?php echo Form::textarea('footer_text', null, ['class' => 'form-control','rows' => 4]); ?>

              <small class="text-danger"><?php echo e($errors->first('footer_text')); ?></small>
            </div>
            <div class="form-group<?php echo e($errors->has('copyright') ? ' has-error' : ''); ?>">
              <?php echo Form::label('copyright', 'Copyright Text'); ?>

              <p class="inline info"> - Please enter copyright text</p>
              <?php echo Form::text('copyright', null, ['class' => 'form-control']); ?>

              <small class="text-danger"><?php echo e($errors->first('copyright')); ?></small>
            </div>
            <div class="form-group<?php echo e($errors->has('f_title2') ? ' has-error' : ''); ?>  lay-one">
              <?php echo Form::label('f_title2', 'Footer Widget 2 Title'); ?>

              <?php echo Form::text('f_title2', null, ['class' => 'form-control']); ?>

              <small class="text-danger"><?php echo e($errors->first('f_title2')); ?></small>
            </div>          
            <div class="form-group<?php echo e($errors->has('f_title3') ? ' has-error' : ''); ?>  lay-one">
              <?php echo Form::label('f_title3', 'Footer Widget 3 Title'); ?>

              <?php echo Form::text('f_title3', null, ['class' => 'form-control']); ?>

              <small class="text-danger"><?php echo e($errors->first('f_title3')); ?></small>
            </div>          
            <div class="form-group<?php echo e($errors->has('f_title4') ? ' has-error' : ''); ?>  lay-one">
              <?php echo Form::label('f_title4', 'Footer Widget 4 Title'); ?>

              <?php echo Form::text('f_title4', null, ['class' => 'form-control']); ?>

              <small class="text-danger"><?php echo e($errors->first('f_title4')); ?></small>
            </div> 
          </div>
          <div class="col-md-6">             
            <div class="form-group<?php echo e($errors->has('playstore_link') ? ' has-error' : ''); ?>">
              <?php echo Form::label('playstore_link', 'Playstore URL'); ?>

                <p class="inline info"> - Please enter playstore url</p>
              <?php echo Form::text('playstore_link', null, ['class' => 'form-control', 'placeholder' => 'https://www.playstore.com/']); ?>

              <small class="text-danger"><?php echo e($errors->first('playstore_link')); ?></small>
            </div> 
            <div class="form-group<?php echo e($errors->has('app_link') ? ' has-error' : ''); ?>">
              <?php echo Form::label('app_link', 'App Store URL'); ?>

                <p class="inline info"> - Please enter your app store url</p>
              <?php echo Form::text('app_link', null, ['class' => 'form-control', 'placeholder' => 'https://www.appstore.com/']); ?>

              <small class="text-danger"><?php echo e($errors->first('app_link')); ?></small>
            </div> 
            <div class="form-group<?php echo e($errors->has('is_mailchimp') ? ' has-error' : ''); ?> switch-main-block">
              <div class="row">
                <div class="col-xs-4">
                  <?php echo Form::label('is_mailchimp', 'Footer Mailchimp'); ?>

                </div>
                <div class="col-xs-5 pad-0">
                  <label class="switch">                
                    <?php echo Form::checkbox('is_mailchimp', 1, null, ['class' => 'checkbox-switch']); ?>

                    <span class="slider round"></span>
                  </label>
                </div>
              </div>
              <div class="col-xs-12">
                <small class="text-danger"><?php echo e($errors->first('is_mailchimp')); ?></small>
              </div>
            </div>     
            <div class="form-group<?php echo e($errors->has('is_playstore') ? ' has-error' : ''); ?> switch-main-block">
                <div class="row">
                  <div class="col-xs-4">
                    <?php echo Form::label('is_playstore', 'Footer Playstore Icon'); ?>

                  </div>
                  <div class="col-xs-5 pad-0">
                    <label class="switch">                
                      <?php echo Form::checkbox('is_playstore', 1, null, ['class' => 'checkbox-switch']); ?>

                      <span class="slider round"></span>
                    </label>
                  </div>
                </div>
                <div class="col-xs-12">
                  <small class="text-danger"><?php echo e($errors->first('is_playstore')); ?></small>
                </div>
            </div>
            <div class="form-group<?php echo e($errors->has('is_app_icon') ? ' has-error' : ''); ?> switch-main-block">
              <div class="row">
                <div class="col-xs-4">
                  <?php echo Form::label('is_app_icon', 'Footer App Icon'); ?>

                </div>
                <div class="col-xs-5 pad-0">
                  <label class="switch">                
                    <?php echo Form::checkbox('is_app_icon', 1, null, ['class' => 'checkbox-switch']); ?>

                    <span class="slider round"></span>
                  </label>
                </div>
              </div>
              <div class="col-xs-12">
                <small class="text-danger"><?php echo e($errors->first('is_app_icon')); ?></small>
              </div>
            </div> 
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

<?php $__env->startSection('custom-script'); ?>
  <script>
    $(document).ready(function () {
      var loadstate = $('#FooterCheckBox').bootstrapSwitch('state');
      if(loadstate == false){                                   
        $(".lay-zero").hide();
        $(".lay-one").show();
      }
      else{ 
        $(".lay-zero").show();
        $(".lay-one").hide();
      }
      $('#FooterCheckBox').on('switchChange.bootstrapSwitch', function (event, state) {
        if(state == false){                                   
          $(".lay-zero").hide();
          $(".lay-one").show();
        }
        else{ 
          $(".lay-zero").show();
          $(".lay-one").hide();
        }
      });
    });
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>