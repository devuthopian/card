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
                 <a href="javascript:void(0)" onclick="openCreateCardPopup()">New Card</a>
               </div>
               @endif
               <div class="button_right">
                 <a href="#">Sort by owner</a>
                 <a href="#">Newest</a>
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
        
        <!-- footer -->
        @include('users.includes.footer')

    </div>
    <!--end wrapper-->
    
    <!-- Edit Profile -->
    @include('users.profile.partials.editProfile')

    <!-- Edit Profile -->
    @include('users.profile.partials.invitePeople')

    <!-- Edit Profile -->
    @include('users.profile.partials.zoomImage')

    <!-- Create Card -->
    @include('users.profile.partials.createCardPopup')
</body>
@endsection
@section('scripts')
<script src="{{ asset('js/users/profile/index.js') }}"></script>
@endsection