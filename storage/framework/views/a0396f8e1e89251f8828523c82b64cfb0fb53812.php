<?php $__env->startSection('content'); ?>
  <div class="container">
    <div class="main">          
        <div class="col-sm-4 first_inner">
            <img src="<?php echo e(URL::asset('images/logo1.png')); ?>" class="logo" alt="">
            <img src="<?php echo e(URL::asset('images/code.jpg')); ?>" class="code" alt="">
        </div>
         <div class="col-sm-8 second_inner">
             <div class="login_cont">
               <h2>Registration</h2>
               <form method="POST" action="<?php echo e(route('register')); ?>">
                <?php echo csrf_field(); ?>
                   <div class="login_field">
                    
                        <!-- Name -->
                        <input name="name" id="name" type="text" class="<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" value="<?php echo e(old('name')); ?>" placeholder="Name" required autofocus>

                        <?php if($errors->has('name')): ?>
                            <span class="invalid-feedback">
                                <strong><?php echo e($errors->first('name')); ?></strong>
                            </span>
                        <?php endif; ?>


                        <!-- Email -->
                        <input name="email" id="email" type="text" class="<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" value="<?php echo e(old('email')); ?>" placeholder="Email" required autofocus>

                        <?php if($errors->has('name')): ?>
                            <span class="invalid-feedback">
                                <strong><?php echo e($errors->first('name')); ?></strong>
                            </span>
                        <?php endif; ?>

                        <!-- Password -->
                        <input name="password" id="password" type="password" class="<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" placeholder="Password" required autofocus>

                        <?php if($errors->has('password')): ?>
                            <span class="invalid-feedback">
                                <strong><?php echo e($errors->first('password')); ?></strong>
                            </span>
                        <?php endif; ?>
                        
                        <!-- Confirm Password -->
                        <input name="password_confirmation" id="password-confirm" type="password" placeholder="Confirm Password" required autofocus>
                            
                        <input type="submit" value="Register">
                   </div>

                   <p>Already Registered? <a href="<?php echo url('login') ?>">Login</a></p>

               </form>
             </div>
         </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.signup', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>