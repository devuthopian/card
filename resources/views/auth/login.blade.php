@extends('layouts.signup')

@section('content')
    <div class="container">
        <div class="main">          
            <img src="images/misbits-logo.png" class="login-logo"/>
             <div class="col-sm-12 second_inner">
                 <div class="login_cont">
                   <h2>Login</h2>
                   <form method="POST" action="{{ route('login') }}">
                    @csrf
                        <div class="socials">
                            <!-- Facebook -->
                            <a href="<?php echo url('auth/facebook') ?>" class="btn btn-social-icon btn-facebook"><i class="fab fa-facebook-f"></i></a>
                            
                            <!-- Twitter -->
                            <a href="<?php echo url('auth/twitter') ?>" class="btn btn-social-icon btn-twitter"><i class="fab fa-twitter"></i></a>

                            <!-- Google -->
                            <a href="<?php echo url('auth/google') ?>" class="btn btn-social-icon btn-google"><i class="fab fa-google"></i></a>

                            <!-- Instagram -->
                            <a href="<?php echo url('auth/instagram') ?>" class="btn btn-social-icon btn-instagram "><i class="fab fa-instagram"></i></a>
                        </div>

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
                        
                        <p>Not Registered? <a href="<?php echo url('register') ?>">Signup now</a>  <span><a href="<?php echo url('password/reset') ?>">Forgot Password?</a></span> </p>

                   </form>
                 </div>
             </div>
        </div>
      </div>
@endsection
