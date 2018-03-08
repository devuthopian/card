<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- Signup Head -->
    <?php echo $__env->make('users.includes.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  </head>
    <!-- Page Content -->
    <?php echo $__env->yieldContent('content'); ?>
    
    <?php echo $__env->yieldContent('scripts'); ?>
</html>