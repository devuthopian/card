<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- Signup Head -->
    <?php echo $__env->make('includes.signup.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  </head>
  <body>    
    <!-- Page Content -->
    <?php echo $__env->yieldContent('content'); ?>
    
  </body>
</html>