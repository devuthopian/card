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
               <h2>Registration</h2>
               <form method="POST" action="{{ route('register') }}">
                @csrf
                   <div class="login_field">
                    
                        <!-- Name -->
                        <input name="name" id="name" type="text" class="{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}" placeholder="Name" required autofocus>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif


                        <!-- Email -->
                        <input name="email" id="email" type="text" class="{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" placeholder="Email" required autofocus>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif

                        <!-- Password -->
                        <input name="password" id="password" type="password" class="{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" required autofocus>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                        
                        <!-- Confirm Password -->
                        <input name="password_confirmation" id="password-confirm" type="password" placeholder="Confirm Password" required autofocus>
                            
                        <input type="submit" value="Register">
                   </div>

                   <p>Already Registered? <a href="<?php echo url('login') ?>">Login</a></p>

               </form>
             </div>
         </div>
    </div>
  </div>
@endsection
