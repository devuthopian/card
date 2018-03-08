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

            <!--end header-->
            <div class="row blocks">
                <!-- Edit Profile -->
                @include('users.profile.partials.allCards')

            </div>
            <!--end row-->
        </div>
        
        <!-- footer -->
        @include('users.includes.footer')

    </div>
    <!--end wrapper-->

    <!-- Edit Profile -->
    @include('users.profile.partials.zoomImage')

</body>
@endsection
@section('scripts')
<script src="{{ asset('js/users/profile/directory.js') }}"></script>
@endsection