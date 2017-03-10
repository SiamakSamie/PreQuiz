 
 <?php $__env->startSection('title'); ?>
     Profile page
 <?php $__env->stopSection(); ?>
 
 <?php $__env->startSection('extra_links'); ?>
 
 <?php $__env->stopSection(); ?>
 
 <?php $__env->startSection('content'); ?>
     
     <div class = "page-header">
         
         <h1 class="text-center">
             Profile page information
         </h1>
         
     </div>
     <?php $__currentLoopData = $user_info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
     <div class="container flex-center">
          <table class="table table-bordered ">
              <thead>
                  <tr>
                      <th>
                         University
                      </th>
                      <th>
                          Name
                      </th>
                      <th>
                          Email
                      </th>
                  </tr>
              </thead>
              <tbody>
              <tr>
                  <td>  <?php echo e($info->university); ?> </td>
                  <td>  <?php echo e($info->name); ?> </td>
                  <td>  <?php echo e($info->email); ?> </td>
                  
              </tr>
              <tr>
                  <td>  <?php echo e($info->university); ?> </td>
                  <td>  <?php echo e($info->name); ?> </td>
                  <td>  <?php echo e($info->email); ?> </td>
              </tr>
              <tr>
                  <td> <?php echo e($info->email); ?> </td>
                  <td> <?php echo e($info->university); ?> </td>
                  <td> <?php echo e($info->name); ?> </td>
              </tr>
              </tbody>
          </table>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
     <button type="button" class="btn btn-primary btn-lg btn-block"> Edit Information
     </button>
           
 <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>