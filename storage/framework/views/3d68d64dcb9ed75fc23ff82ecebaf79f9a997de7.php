<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="main">          
            <div class="col-sm-4 first_inner">
                <img src="<?php echo e(URL::asset('images/logo1.png')); ?>" class="logo" alt="">
                <img src="<?php echo e(URL::asset('images/code.jpg')); ?>" class="code" alt="">
            </div>
             <div class="col-sm-8 second_inner">
                 <div class="login_cont">
                   <h2>Login</h2>
                   <form method="POST" action="<?php echo e(route('login')); ?>">
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

                            <div class="pull-left">
                                <label>
                                    <input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>> Remember Me
                                </label>
                            </div>

                            <input type="submit" value="Login">

                        </div>

                        <p>Not Registered? <a href="<?php echo url('register') ?>">Create an account</a>  <span><a href="<?php echo url('password/reset') ?>">Forgot Password</a></span> </p>
                   </form>
                 </div>
             </div>
        </div>
      </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.signup', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>