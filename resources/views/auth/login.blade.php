@extends('layouts.signup')

@section('content')
    <div class="container">
        <div class="main">          
            <div class="col-sm-4 first_inner">
                <img src="{{ URL::asset('images/logo1.png') }}" class="logo" alt="">
                <img src="{{ URL::asset('images/code.jpg') }}" class="code" alt="">
            </div>
             <div class="col-sm-8 second_inner">
                 <div class="login_cont">
                   <h2>Login</h2>
                   <form method="POST" action="{{ route('login') }}">
                    @csrf
                        <div class="login_field">

                            <!-- Email -->
                            <input name="email" id="email" type="text" class="{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" placeholder="Email" required autofocus>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                            
                            <!-- Password -->
                            <input name="password" id="password" type="password" class="{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" required autofocus>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif

                            <div class="pull-left">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                </label>
                            </div>

                            <input type="submit" value="Login">

                        </div>

                        <p>Not Registered? <a href="<?php echo url('register') ?>">Create an account</a>  <span><a href="<?php echo url('password/reset') ?>">Forgot Password</a></span> </p>
                   </form>
                 </div>
             </div>
        </div>
      </div>
@endsection
