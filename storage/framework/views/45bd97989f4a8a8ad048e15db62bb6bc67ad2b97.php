<?php $userProfilesObj = $userDetailsObj->user_profiles; ?>
<?php if(count($userProfilesObj)>0): ?>
<?php $i=0; ?>
    <?php $__currentLoopData = $userProfilesObj; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $userProfile): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-sm-6 col-md-4 block-container" id="profile_<?php echo $userProfile->id ?>">
            <div class="pop_up">
                <h2> <?php echo e($userProfile->name); ?></h2>
                <img src="<?php echo e(URL::asset('uploads/user/profile')); ?>/<?php echo e($userProfile->profile_image); ?>" alt="" style="min-height: 400px;">
                <div class="content_caption">
                    <h4> <span><?php echo e($userProfile->description); ?></span></h4>
                </div>
                <div class="hover_pop">
                    <ul>
                        <li>&nbsp;</li>
                        <li><a href="<?php echo url('user/index', $userProfile->id) ?>">View</a></li>

                        <?php $setDefaultClass = $removeProfileClass = ''; ?>
                        <?php if(!empty($userProfile->is_default)): ?>
                        <?php $setDefaultClass = $removeProfileClass = 'hide'; ?>
                        <?php endif; ?>
                        
                        <?php if(count($userProfilesObj)>1): ?>
                        <li id="removeProfileButton<?php echo $userProfile->id ?>" class="<?php echo e($removeProfileClass); ?> removeProfileButtons">
                            <a href="javascript:void()" onclick="removeProfile('<?php echo $userProfile->id ?>')">Remove</a>
                        </li>
                        <?php endif; ?>
                        <li id="defaultProfileButton<?php echo $userProfile->id ?>" class="<?php echo e($setDefaultClass); ?> setDefaultButtons">
                            <a href="javascript:void()" onclick="setDefaultProfile('<?php echo $userProfile->id ?>')">Set Default</a>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </div>
        <?php $i++; ?>
        <?php if($i%3==0): ?>
        <div class="clearfix"></div>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
    <div class="text-center">Profiles not available</div>
<?php endif; ?>