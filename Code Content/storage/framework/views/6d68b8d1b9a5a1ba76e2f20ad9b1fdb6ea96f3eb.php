 
 <?php $__env->startSection('title'); ?>
     Profile page
 <?php $__env->stopSection(); ?>
 
 <?php $__env->startSection('extra_links'); ?>
 <?php $__env->stopSection(); ?>
 
 <?php $__env->startSection('content'); ?>
   <div class="container" style = "padding-top:50px">
    <h1>Profile information</h1>
  	<hr>
	<div class="row">
      <!-- left column -->
      <div class="col-md-3">
        <div class="text-center">
          <img src="/img/profile_pic.jpg" class="avatar img-circle" alt="avatar">
          <h6>Default profile picture</h6>
          
        </div>
      </div>
      
      <!-- profile information -->
      <div class="col-md-9 personal-info">
       
        <h3><b>Personal info</b></h3>
        
         <?php $__currentLoopData = $user_info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <form class="form-horizontal" role="form" action = "/EditProfile" method ="POST">
          <?php echo e(csrf_field()); ?>

          
          <div class="form-group">
            <label class="col-lg-3 control-label">Name:</label>
            <p> <?php echo e($info->name); ?></p>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">University:</label>
            <p>Some university</p>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <p><?php echo e($info->email); ?></p>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Password:</label>
            <p>************</p>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <input type="submit" class="btn btn-primary"  value="Edit Profile">
            </div>
          </div>
        </form>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
  </div>
</div>
<hr>
 <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>