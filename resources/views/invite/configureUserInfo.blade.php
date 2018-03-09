@extends('layouts.signup')

@section('content')
    <div class="container">
        <div class="main">          
             <div class="col-sm-12 second_inner">
                 <div class="login_cont">
                   <h2>Register</h2>
                   <form method="POST" action="{{ url('configureUserInfo') }}/{{$user->id}}">
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

                            <input type="submit" value="Register">

                            <!-- <a href="<?php echo url('auth/facebook') ?>" class="btn btn-default btn-md">Log in with Facebook</a>
                            <a href="<?php echo url('auth/twitter') ?>?id=<?php echo $user->id ?>" class="btn btn-default btn-md">Log in with Twitter</a> -->
                            
                        </div>
                   </form>
                 </div>
             </div>
        </div>
      </div>
@endsection