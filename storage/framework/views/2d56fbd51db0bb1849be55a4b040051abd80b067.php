<div class="header">
    <div class="header-top"
style="background-image: url(<?php echo e(URL::asset('images/header-background.jpg')); ?>); ">
        <div class="header-content left">
            <div class="header-right right">
                <!-- <a href="#" class="verify-btn">verify</a>
                <a href="#" class="unverify-btn">unverified</a> -->
                <div class="header-image">
                    <?php $profile_image = $profile->profile_image; ?>
                    <?php if(!empty($profile_image)){ ?>
                        <img src="<?php echo e(URL::asset('uploads/user/profile/')); ?>/<?php echo e($profile_image); ?>">
                    <?php }else{ ?>
                        <img src="<?php echo e(URL::asset('images/avtar.jpg')); ?>">
                    <?php } ?>
                </div>
            </div>
            <div class="header-details left">
                <p class="header-breif left">
                    <?php echo e($profile->description); ?>

                </p>
                <div class="clearfix"></div>
                <div class="user-name left">
                    <p class="name"><?php echo e($profile->name); ?></p>
                    <p>market cap: 500 MBC</p>
                    <p>bonuses: 50,000</p>
                </div>
    <p>&nbsp;</p>
    <p>
        &nbsp;&nbsp;<a class="btn btn-primary" data-toggle="modal" href="javascript:void(0)" onclick="generateInviteLink()">
            invite people
        </a>
    </p>
    <p>
        &nbsp;&nbsp;<a class="btn btn-primary" data-toggle="modal" href="javascript:void(0)" data-target="#editProfileModal">
            edit profile
        </a>
    </p>
                <!--end user-name-->
            </div>
            <!--end header-details-->
        </div>
        <!--end header-content-->
    </div>
    <!--end header-top-->
    <div class="header-bottom row">
        <div class="col-sm-1 latest">Chirp</div>
        <div class="col-sm-9">Here I am once more in this scene of dissipation and vice, and I begin already to find my morals corrupted. 1h</div>
        <div class="col-sm-2">
            <a href="#" class="right">
                <div class="left">view all</div>
                <div class="view-toggle left">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </div>
            </a>
        </div>
    </div>
    <!--end header-bottom-->
</div>