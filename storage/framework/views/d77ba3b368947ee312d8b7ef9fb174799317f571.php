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
                <h2>Tracking Profile</h2>
                    <table>
                        <tr>
                            <th>Name</th>
                            <th>Invited Profile</th>
                            <th>Invited Profile Link</th>
                            <th>Cards owned</th>
                            <th>Confidente</th>
                            <th>Fan</th>
                            <th>Backer</th>
                        </tr>
                        <?php $__currentLoopData = $userResultObj->user_profiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userProfileObj): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $__currentLoopData = $userProfileObj->invitations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invitationObj): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $__currentLoopData = $invitationObj->users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userObj): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($userObj->name); ?></td>
                                            <td><?php echo e($userProfileObj->name); ?></td>
                                            <td><?php echo url('share').'?id='.$invitationObj->profile_id.'_'.$invitationObj->unique_id; ?></td>
                                            <td>Lorem</td>
                                            <td>Lorem</td>
                                            <td>Lorem</td>
                                            <td>Lorem</td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('users.layouts.profile', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>