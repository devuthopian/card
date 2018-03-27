@extends('users.layouts.profile')
@section('content')

<body onload="sizing()" onresize="sizing()">
    <div class="wrapper">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <!--end navbar-header-->
                @include('users.profile.partials.top_navbar')
                <!--end navbar-collapse-->
            </div>
            <!--end navbar-->
        </nav>
        <div class="content">
            
            <!-- Edit Profile -->
            @include('users.profile.partials.profileHeader')

            <div class="button_cont">
                @if($profile->user->id == Auth::id())
               <div class="button_left">
                 <a href="javascript:void(0)" onclick="openCreateCardPopup()" class="yellow-btn">New Card</a>
               </div>
               @endif
               <div class="button_right">
                 <a href="#" class="black-btn">Sort by owner</a>
                 <a href="#" class="white-btn">Newest</a>
               </div>
            </div>

            <!--end header-->
            <div class="row blocks">
                <!-- Edit Profile -->
                @include('users.profile.partials.cards')

            </div>
            <div class="row">
                <div class="col-sm-12 text-right">
                    {!! $cardsObj->render() !!}
                </div>
            </div>
            <!--end row-->
        </div>
        <?php if(!empty($profile->profile_background_image)){
            $page_background_image = URL::asset('uploads/user/profile/backgroundImages').'/'.$profile->profile_background_image; 
            ?>
            <div class="bg-image" style="background: url({{ $page_background_image }}) no-repeat center center fixed !important"></div>
        <?php } ?>
        
        <!-- footer -->
        @include('users.includes.footer')

        <!--end header-top-->
        <div class="chirp-pop row">
            <div class="col-sm-1 latest">Chirp</div>
            <div class="col-sm-11">
                <p>Here I am once more in this scene of dissipation and vice, and I begin already to find my morals corrupted. 1h</p>
                </div>
        </div>
        <!--end header-bottom-->

    </div>
    <!--end wrapper-->
    
    <!-- Edit Profile -->
    @include('users.profile.partials.editProfile')

    <!-- Edit Profile -->
    @include('users.profile.partials.invitePeople')

    <!-- Edit Profile -->
    @include('users.profile.partials.zoomImage')

    <!-- Crop Image Popup -->
    @include('users.profile.partials.verifyPopup')

    <!-- Create Card -->
    @include('users.profile.partials.createCardPopup')

    <!-- Crop Image Popup -->
    @include('users.profile.partials.cropImagePopup')

    <!-- SMS Popup -->
    @include('users.profile.partials.smsVerificationPopup')

</body>
@endsection
@section('scripts')
<script src="{{ asset('js/users/profile/index.js') }}"></script>
@endsection