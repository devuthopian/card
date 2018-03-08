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
            
            <!-- Edit Profile -->
            <?php echo $__env->make('users.profile.partials.profileHeader', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <div class="button_cont">
               <div class="button_left">
                 <a href="javascript:void(0)" onclick="openCreateCardPopup()">New Card</a>
               </div>
               <div class="button_right">
                 <a href="#">Sort by owner</a>
                 <a href="#">Newest</a>
               </div>
            </div>

            <!--end header-->
            <div class="row blocks">
                <!-- Edit Profile -->
                <?php echo $__env->make('users.profile.partials.cards', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            </div>
            <!--end row-->
        </div>
        
        <!-- footer -->
        <?php echo $__env->make('users.includes.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    </div>
    <!--end wrapper-->

    <!-- Edit Profile -->
    <?php echo $__env->make('users.profile.partials.editProfile', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <!-- Edit Profile -->
    <?php echo $__env->make('users.profile.partials.invitePeople', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <!-- Edit Profile -->
    <?php echo $__env->make('users.profile.partials.zoomImage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <!-- Create Card -->
    <?php echo $__env->make('users.profile.partials.createCardPopup', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</body>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(asset('js/users/profile/index.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('users.layouts.profile', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>