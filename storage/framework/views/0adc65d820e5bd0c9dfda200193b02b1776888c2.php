<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Directory</div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>                    
                    <div id="container"></div>
                </div>
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>

            </div>
        </div>
        <div class="col-md-8">
            <?php $__currentLoopData = $Cards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $card): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	            <div class="col-md-3 onhover" id="<?php echo e($card->id); ?>" style="display: inline-block;">
	                <div class="module_holder">
	                    <div id="col-md-3">
	                        <input type="hidden" name="txtID" class="txtClass" value="<?php echo e($card->id); ?>">
	                        <img src="<?php echo e(URL::asset('images/')); ?>/<?php echo e($card->image); ?>" height="196px" width="100%">
	                        <?php echo e($card->description); ?>


	                        <br>

	                        <?php echo e($card->card_name); ?>


	                    </div>
	                </div>
	            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>