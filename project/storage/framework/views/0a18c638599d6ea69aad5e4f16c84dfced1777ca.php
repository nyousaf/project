<?php $__env->startSection('content'); ?>
  <div class="admin-form-main-block mrg-t-40">
      
       
      <?php echo Form::model($ad_settings, ['method' => 'PATCH', 'action' => ['AdsettingController@ad_update']]); ?>


   
         <div class="row admin-form-block z-depth-1">
          <div class="col-md-8">  
            <h6 class="admin-form-text" style="margin-bottom: 20px;">Shutterstock Ad Settings</h6>
 <div class="form-group<?php echo e($errors->has('Embedd_code') ? ' has-error' : ''); ?>">
                <?php echo Form::label('Embedd_code', 'Ad widget Id'); ?>

                <p class="inline info"> - Please Enter Your Shutterstock Embedd Code</p>
                <?php echo Form::text('Embedd_code', null, ['class' => 'form-control', 'placeholder' => '5d3c43f74e0abc570b092c62']); ?>

                <small class="text-danger"><?php echo e($errors->first('Embedd_code')); ?></small>
            </div>
        
            
 <div class="form-group<?php echo e($errors->has('image_flag') ? ' has-error' : ''); ?> switch-main-block">
              <div class="row">
                <div class="col-xs-4">
                  <?php echo Form::label('image_flag', 'Show Ad on Images Page'); ?>

                </div>
                <div class="col-xs-5 pad-0">
                  <label class="switch">                
                    <?php echo Form::checkbox('image_flag', 1, null, ['class' => 'checkbox-switch']); ?>

                    <span class="slider round"></span>
                  </label>
                </div>
              </div>
              <div class="col-xs-12">
                <small class="text-danger"><?php echo e($errors->first('image_flag')); ?></small>
              </div>
            </div>

<div class="form-group<?php echo e($errors->has('catagory_flag') ? ' has-error' : ''); ?> switch-main-block">
              <div class="row">
                <div class="col-xs-4">
                  <?php echo Form::label('catagory_flag', 'Show Ad on Category Page'); ?>

                </div>
                <div class="col-xs-5 pad-0">
                  <label class="switch">                
                    <?php echo Form::checkbox('catagory_flag', 1, null, ['class' => 'checkbox-switch']); ?>

                    <span class="slider round"></span>
                  </label>
                </div>
              </div>
              <div class="col-xs-12">
                <small class="text-danger"><?php echo e($errors->first('catagory_flag')); ?></small>
              </div>
            </div>
            <div class="form-group<?php echo e($errors->has('search_flag') ? ' has-error' : ''); ?> switch-main-block">
              <div class="row">
                <div class="col-xs-4">
                  <?php echo Form::label('search_flag', 'Show Ad on Search Page'); ?>

                </div>
                <div class="col-xs-5 pad-0">
                  <label class="switch">                
                    <?php echo Form::checkbox('search_flag', 1, null, ['class' => 'checkbox-switch']); ?>

                    <span class="slider round"></span>
                  </label>
                </div>
              </div>
              <div class="col-xs-12">
                <small class="text-danger"><?php echo e($errors->first('search_flag')); ?></small>
              </div>
            </div>
<div class="form-group<?php echo e($errors->has('home_flag') ? ' has-error' : ''); ?> switch-main-block">
              <div class="row">
                <div class="col-xs-4">
                  <?php echo Form::label('home_flag', 'Show Ad on Home Page'); ?>

                </div>
                <div class="col-xs-5 pad-0">
                  <label class="switch">                
                    <?php echo Form::checkbox('home_flag', 1, null, ['class' => 'checkbox-switch']); ?>

                    <span class="slider round"></span>
                  </label>
                </div>
              </div>
              <div class="col-xs-12">
                <small class="text-danger"><?php echo e($errors->first('home_flag')); ?></small>
              </div>
            </div>


             <div class="col-md-12"> 
            <button type="submit" class="btn btn-block btn-success" >Save Settings</button>
            <div class="clear-both"></div>
          </div>
          </div>
          </div>
            <?php echo Form::close(); ?> 
      

        </div>
     
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>