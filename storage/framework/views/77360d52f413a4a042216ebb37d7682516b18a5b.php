<?php $__env->startSection('content'); ?>
<body onload="sizing()" onresize="sizing()">
    <div class="wrapper">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <!--end navbar-header-->
                <?php echo $__env->make('users.profile.partials.top_navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <!--end navbar-collapse-->
            </div>
            <!--end navbar-->
        </nav>
        <div class="content">

            <!--end header-->
            <div class="row blocks">
                <!-- Edit Profile -->
                <?php echo $__env->make('users.profile.partials.allCards', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            </div>
            <!--end row-->
        </div>
        
        <!-- footer -->
        <?php echo $__env->make('users.includes.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    </div>
    <!--end wrapper-->

    <!-- Edit Profile -->
    <?php echo $__env->make('users.profile.partials.zoomImage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

</body>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(asset('public/js/users/profile/directory.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('users.layouts.profile', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>