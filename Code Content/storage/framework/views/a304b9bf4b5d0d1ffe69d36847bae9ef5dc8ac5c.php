<?php $__env->startSection('title'); ?>
    Welcome Page
<?php $__env->stopSection(); ?>


<div class="flex-center position-ref full-height">
    <style>

       /* .links > a {
            -webkit-transition: all .2s;
            -moz-transition: all .2s;
            transition: all .2s;

            background-size: 100% 200%;
            background-color: #336699;
            background-image: linear-gradient(to bottom, white 50%, #336699 50%);
        }

        .links > a:hover {
            color: white;
            background-position: 0 -100%;
        }*/

    </style>
    <?php if(Route::has('login')): ?>
        <div class="top-right links">
            <?php if(Auth::check()): ?>
                <a href="<?php echo e(url('/home')); ?>">Home</a>
            <?php else: ?>
                <a href="<?php echo e(url('/login')); ?>">Login</a>
                <a href="<?php echo e(url('/register')); ?>">Register</a>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <div class="content">
        <div class="title m-b-md">
            <div class="input-title" > PreQuiz </div> 
            <input class="input-submit" type="submit" value="" >
            <input class="input-field" type="text" placeholder="Type the name of your institution">
        </div>

    </div>
</div>

<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>