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
            <div class="container">
                <div class="tracking_cont">

                    <?php echo e(Form::open(array('url' => 'user/profile/settings', 'id' => 'settings'))); ?>

                    <div class="tracking_cont_left">
                        <h2>My Account</h2>
                        <?php echo e(Form::text('name', Auth::user()->name, array('id' => 'name', 'required'=> true, 'placeholder'=>'Public Name'))); ?>

                        <?php echo e(Form::text('email', Auth::user()->email, array('id' => 'email', 'required'=> true, 'placeholder'=>'Email'))); ?>

                        <?php echo e(Form::submit('Save', array('name'=>'saveSettings', 'id'=>'saveSettings'))); ?>

                    </div>
                    <?php echo e(Form::close()); ?>

                    <?php echo e(Form::open(array('url' => 'user/profile/settings', 'id' => 'settings'))); ?>

                    <div class="tracking_cont_right">
                        <?php if(session('status')): ?>
                            <div class="alert alert-success">
                                <?php echo e(session('status')); ?>

                            </div>
                        <?php endif; ?>
                        <h2>Change Password</h2>

                        <!-- Current Password -->
                        <?php echo e(Form::password('current_password', null, array('id' => 'current_password', 'required'=> true, 'placeholder'=>'Current Password'))); ?>

                        <?php if(session('current_password')): ?>
                            <span class="invalid-feedback">
                                <strong><?php echo e(session('current_password')); ?></strong>
                            </span>
                        <?php endif; ?>

                        <!-- New Password -->
                        <?php echo e(Form::password('password', null, array('id' => 'password', 'required'=> true, 'placeholder'=>'New Password'))); ?>

                        <?php if($errors->has('password')): ?>
                            <span class="invalid-feedback">
                                <strong><?php echo e($errors->first('password')); ?></strong>
                            </span>
                        <?php endif; ?>

                        <!-- Confirm Password -->
                        <?php echo e(Form::password('password_confirmation', null, array('id' => 'password_confirmation', 'required'=> true, 'placeholder'=>'Confirm Password'))); ?>

                        
                        <?php echo e(Form::submit('Save', array('name'=>'changePassword', 'id'=>'changePassword'))); ?>

                    
                    </div>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
    </div>
</body>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('users.layouts.profile', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>