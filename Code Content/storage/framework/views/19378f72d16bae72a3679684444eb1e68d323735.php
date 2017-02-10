<!DOCTYPE html>
<html lang="<?php echo e(config('app.locale')); ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <?php echo $__env->yieldContent('extra_head'); ?>

        <title> <?php echo $__env->yieldContent('title'); ?> </title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="css/welcome.css" rel="stylesheet" type="text/css">

        <?php echo $__env->yieldContent('extra_css'); ?>
    </head>
    <body>
    	<?php echo $__env->yieldContent('content'); ?>

    </body>
</html>
