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
        <div class="setting_wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <button type="button" id="sidebarCollapse" class="toggle">
                  <i class="fas fa-align-left"></i>
                </button>
                <?php 
                    $my_account_active_tab = 'active';
                    $login_active_tab = $connections_active_tab = '';

                    $my_account_hide_class = '';
                    $login_hide_class = $connections_hide_class = 'hide';

                    if($tab == 'changePassword' || $tab == 'profileVerification'){
                        $my_account_hide_class = $connections_hide_class = 'hide';
                        $login_hide_class = '';
                    }

                    if($tab == 'connections'){
                        $my_account_hide_class = $login_hide_class = 'hide';
                        $connections_hide_class = '';
                    }

                ?>
                
                <ul class="list-unstyled components">
                    <h2>User Setting</h2>
                    <li class="{{$my_account_active_tab}}" id="my_account_tab">
                        <a href="javascript:void(0)"  onclick="activeTab('my_account')">My Account</a>
                    </li>
                    <li class="{{$login_active_tab}}" id="login_tab">
                        <a href="javascript:void(0)" onclick="activeTab('login')">Login</a>
                    </li>
                    <li class="{{$connections_active_tab}}" id="connections_tab">
                        <a href="javascript:void(0)" onclick="activeTab('connections')">Connections</a>
                    </li>
                </ul>
                
            </nav>

            <!-- Page Content Holder -->
            <div id="content">
                <div class="tracking_cont">
                    <!-- My Account Form -->
                    {{ Form::open(array('url' => 'user/profile/settings', 'id' => 'settings')) }}
                    <div class="tracking_cont_left tabs {{$my_account_hide_class}}" id="my_account">
                        @if (session('account_status'))
                            <div class="alert alert-success">
                                {{ session('account_status') }}
                            </div>
                        @endif
                        <h2>My Account</h2>
                        {{ Form::text('name', Auth::user()->name, array('id' => 'name', 'required'=> true, 'placeholder'=>'Public Name')) }}
                        {{ Form::text('email', Auth::user()->email, array('id' => 'email', 'required'=> true, 'placeholder'=>'Email', 'readonly'=>true)) }}
                        {{ Form::submit('Save', array('name'=>'saveSettings', 'id'=>'saveSettings')) }}
                    </div>
                    {{ Form::close() }}
                    <!-- My Account Form - END -->
                    <div class="{{$login_hide_class}} tabs" id="login">
                        <!-- Change Password Form -->
                        {{ Form::open(array('url' => 'user/profile/settings', 'id' => 'settings')) }}
                            <div class="tracking_cont_left " >
                                @if (session('status'))
                                    <div class="alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <h2>Change Password</h2>

                                <!-- Current Password -->
                                {{ Form::input('password', 'current_password', null, array('id' => 'current_password', 'required'=> true, 'placeholder'=>'Current Password')) }}


                                @if (session('current_password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ session('current_password') }}</strong>
                                    </span>
                                @endif

                                <!-- New Password -->

                                {{ Form::input('password', 'password', null, array('id' => 'password', 'required'=> true, 'placeholder'=>'New Password')) }}

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

                                <!-- Confirm Password -->

                                {{ Form::input('password', 'password_confirmation', null, array('id' => 'password_confirmation', 'required'=> true, 'placeholder'=>'Confirm Password')) }}
                                
                                {{ Form::submit('Save', array('name'=>'changePassword', 'id'=>'changePassword')) }}
                            </div>
                        {{ Form::close() }}
                            <!-- Change Password Form -->

                        <!-- profile verification -->
                                        
                    </div>
                    <!-- connections -->
                    @include('users.profile.partials.connections') 
                    
                </div>    
            </div>
        </div>
    </div>
    <!-- SMS Popup -->
    @include('users.profile.partials.smsVerificationPopup')
</body>
@endsection
@section('scripts')
<script src="{{ asset('js/users/profile/settings.js') }}"></script>
@endsection