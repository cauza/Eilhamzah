<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    
    <?php echo $__env->yieldContent('title'); ?>

    <link href="<?php echo e(asset('assets/css/coreui-icons.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/css/flag-icon.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/css/font-awesome.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/css/simple-line-icons.css')); ?>" rel="stylesheet">

    <link href="<?php echo e(asset('assets/css/style.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/css/pace.min.css')); ?>" rel="stylesheet">
</head>
<body class="app flex-row align-items-center">
    <div class="container">
        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <script src="<?php echo e(asset('assets/js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/pace.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/perfect-scrollbar.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/coreui.min.js')); ?>"></script>
    <script>
        $('#ui-view').ajaxLoad();
        $(document).ajaxComplete(function() {
            Pace.restart()
        });
    </script>
</body>
</html><?php /**PATH C:\xampp\htdocs\App\Eilhamzah\resources\views/layouts/auth.blade.php ENDPATH**/ ?>