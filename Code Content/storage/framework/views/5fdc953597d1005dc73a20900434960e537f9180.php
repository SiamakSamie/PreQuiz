<?php $__env->startSection('title'); ?>
    Welcome Page
<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra_links'); ?>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<!-- {{ }} is angularJS -->
<!-- {{ }} is blade -->

<!-- parralax image before the search form -->
    <div class="parallax">
        <h1 >BRUSHING UP YOUR BASICS</h1>
        <p>you are very good, but you can be better. If you aren't so good and not sure of your stuff, then you have come to the right place.</p>
    </div>
    
    <div class="flex-center text-center" style="background-color: #f5f8fa">
        <div class="panel panel-default panel-index" 
         ng-controller="searchForm-controller">
            
            <div class="panel-body">
                <div class="input-title"> Get Started </div>
                
                <form id="uni_form" ng-submit="fetchCourses(selected_uni)" autocomplete="off" class="displayed">
                    <input class="input-submit" type="submit" value="">
                    
                    <input list="uni_names" name="uni_name" type="text" class="input-field" ng-model="selected_uni" 
                    placeholder="Enter the name of your institution" ng-change="autocomplete_unis(selected_uni)" required> 
                    
                    <datalist id="uni_names">
                        <option ng-repeat="match in matching" value="{{match}}"></option>
                    </datalist>
                    
                    <?php if($errors->any()): ?>
                         <script> alert('No entries found, please enter a correct course name');</script>
                    <?php endif; ?>
                    
                </form>  
                
                <form  id="course_form" method="POST" action="/search" class="hidden" autocomplete="off">
                    <input type="text" class="input-field extended-input text-center" value="{{selected_uni}}" readonly>
                    <?php echo e(csrf_field()); ?>  <!-- needed for laravel security otherwise nothing works-->
                    <div class="form-group">
                        <input class="input-submit" type="submit" value="">
                        
                        <input name="uni_name" type="hidden" value="{{selected_uni}}">
                        
                        <input list="course_names" name="course_id" type="text" class=" input-field" ng-model="selected_course" 
                        placeholder="Enter your course name" ng-change="autocomplete_courses(selected_course)" >
                        
                        <datalist id="course_names">
                            <option ng-repeat="match in matching" value="{{match}}"></option>
                        </datalist>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>