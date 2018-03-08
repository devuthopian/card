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
            <div class="container">
                <div class="tracking_cont">
                    {{ Form::open(array('url' => 'user/profile/settings', 'id' => 'settings')) }}
                    <div class="tracking_cont_left">
                        <h2>My Account</h2>
                        {{ Form::text('name', Auth::user()->name, array('id' => 'name', 'required'=> true, 'placeholder'=>'Public Name')) }}
                        {{ Form::text('email', Auth::user()->email, array('id' => 'email', 'required'=> true, 'placeholder'=>'Email')) }}
                        {{ Form::submit('Save', array('name'=>'saveSettings', 'id'=>'saveSettings')) }}
                    </div>
                    {{ Form::close() }}
                    {{ Form::open(array('url' => 'user/profile/settings', 'id' => 'settings')) }}
                    <div class="tracking_cont_right">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h2>Change Password</h2>

                        <!-- Current Password -->
                        {{ Form::password('current_password', null, array('id' => 'current_password', 'required'=> true, 'placeholder'=>'Current Password')) }}
                        @if (session('current_password'))
                            <span class="invalid-feedback">
                                <strong>{{ session('current_password') }}</strong>
                            </span>
                        @endif

                        <!-- New Password -->
                        {{ Form::password('password', null, array('id' => 'password', 'required'=> true, 'placeholder'=>'New Password')) }}
                        @if ($errors->has('password'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif

                        <!-- Confirm Password -->
                        {{ Form::password('password_confirmation', null, array('id' => 'password_confirmation', 'required'=> true, 'placeholder'=>'Confirm Password')) }}
                        
                        {{ Form::submit('Save', array('name'=>'changePassword', 'id'=>'changePassword')) }}
                    
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</body>
@endsection