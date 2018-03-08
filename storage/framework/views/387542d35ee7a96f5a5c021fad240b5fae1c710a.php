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
                <h2>Tracker</h2>
                    <table>
                        <tr>
                            <th>Name</th>
                            <th>Cards</th>
                            <th>Others</th>
                        </tr>
                        <?php if(!empty($userDetailsObj->reference_user_profile)): ?>
                            <?php $referenceUserProfile = $userDetailsObj->reference_user_profile; ?>
                            <tr>
                                <td><?php echo e($referenceUserProfile->name); ?></td>
                                <td>Lorem</td>
                                <td>Lorem</td>
                            </tr>
                        <?php else: ?>
                            <tr>
                                <td colspan="3" class="text-center"> No Trackers Available</td>
                            </tr>
                        <?php endif; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('users.layouts.profile', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>