<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="main">          
             <div class="col-sm-12 second_inner">
                 <div class="login_cont">
                   <h2>Register</h2>
                   <form method="POST" action="<?php echo e(url('configureUserInfo')); ?>/<?php echo e($user->id); ?>">
                    <?php echo csrf_field(); ?>
                        <div class="login_field">
                            <!-- Email -->
                            <input name="email" id="email" type="text" class="<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" value="<?php echo e(old('email')); ?>" placeholder="Email" required autofocus>

                            <?php if($errors->has('email')): ?>
                                <span class="invalid-feedback">
                                    <strong><?php echo e($errors->first('email')); ?></strong>
                                </span>
                            <?php endif; ?>
                            
                            <!-- Password -->
                            <input name="password" id="password" type="password" class="<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" placeholder="Password" required autofocus>

                            <?php if($errors->has('password')): ?>
                                <span class="invalid-feedback">
                                    <strong><?php echo e($errors->first('password')); ?></strong>
                                </span>
                            <?php endif; ?>

                            <input type="submit" value="Register">

                        </div>
                   </form>
                 </div>
             </div>
        </div>
      </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.signup', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>