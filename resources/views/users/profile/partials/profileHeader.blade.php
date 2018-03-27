<?php $background_image = URL::asset('images/header-background.jpg'); ?>
@if(!empty($profile->cover_image))
<?php $background_image = URL::asset('uploads/user/profile/coverImages').'/'.$profile->cover_image; ?>
@endif
<div class="header">
    <div class="header-top" id="cover_image_div" 
style="background-image: url({{ $background_image }}); ">
        <div class="header-content left">
            <div class="header-right right">
                @if(!empty($profile->user->linked_social_accounts) && (count($profile->user->linked_social_accounts)>0))
                    <a class="verify-btn" onclick="openVerifyPopup()" href="javascript:void(0)" >
                        verify
                    </a>
                @endif
                <div class="header-image">
                    <?php $profile_image = $profile->profile_image; ?>
                    <?php if(!empty($profile_image)){ ?>
                        <img id="profile_image" src="{{ URL::asset('uploads/user/profile/profileImages') }}/{{$profile_image}}">
                    <?php }else{ ?>
                        <img id="profile_image" src="{{ URL::asset('images/avtar.jpg') }}">
                    <?php } ?>
                </div>
            </div>
            <div class="header-details left">
                <p class="header-breif left" style="color:{{$profile->description_color}}">
                    {{ $profile->description }}
                </p>
                <div class="clearfix"></div>
                <div class="user-name left">
                    <p class="name" style="color:{{$profile->title_color}}">{{ $profile->name }}</p>
                    <p>market cap: 500 MBC</p>
                    <p>bonuses: 50,000</p>
                </div>
                @if($profile->user->id == Auth::id())
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
                @endif
                <!--end user-name-->
            </div>
            <!--end header-details-->
        </div>

        @if($profile->user->id == Auth::id())
            <p>
                &nbsp;&nbsp;<a class="btn btn-info" data-toggle="modal" href="javascript:void(0)" onclick="resetCoverImage()">
                    <i class="fa fa-undo"></i>
                    reset cover image
                </a>
            </p>
            <p>
                &nbsp;&nbsp;<a class="btn btn-info" data-toggle="modal" href="javascript:void(0)" onclick="resetProfileImage()">
                    <i class="fa fa-undo"></i>
                    reset profile image
                </a>
            </p>
            <p>
                &nbsp;&nbsp;<a class="btn btn-info" data-toggle="modal" href="javascript:void(0)" onclick="resetProfileBackground()">
                    <i class="fa fa-undo"></i>
                    reset profile background
                </a>
            </p>
        @endif
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