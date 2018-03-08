@extends('users.layouts.profile')
@section('content')
<?php
//dd($userDetailsObj);
?>
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
            <br><br>
            <div class="button_cont">
               <div class="button_left">
                 <a href="javascript:void(0)" onclick="openCreateProfilePopup()">New Profile</a>
               </div>
            </div>

            <!--end header-->
            <div class="row blocks">
                <!-- Edit Profile -->
                @include('users.profile.partials.profiles')

            </div>
            <!--end row-->
        </div>
        
        <!-- footer -->
        @include('users.includes.footer')

    </div>
    <!--end wrapper-->

    <!-- Edit Profile -->
    @include('users.profile.partials.newProfilePopup')

</body>
@endsection
@section('scripts')
<script src="{{ asset('js/users/profile/myProfiles.js') }}"></script>
@endsection