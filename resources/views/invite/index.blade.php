<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Website</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="Website"/>
    <meta name="body" content="Website"/>
    <meta name="description" content="Website"/>
    <meta name="summary" content="Website"/>
    <meta http-equiv="Bulletin-Text" content="Website"/>
    <meta name="page-topic" content="Website"/>
    <meta http-equiv="Content-Style-Type" content="text/css"/>
    <link rel="shortcut icon" href="{{ URL::asset('images/logo.png') }}" type="image/x-icon" />

    <link rel="stylesheet" href="{{ URL::asset('assets/vendor/css/style.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('assets/vendor/css/invite.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('assets/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('assets/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('assets/fontawesome-all.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('assets/sweetalert2/dist/sweetalert2.min.css') }}">
    
    <script src="{{ URL::asset('assets/vendor/jquery/jquery.js') }}"></script>
    <script src="{{ URL::asset('js/invite/index.js') }}"></script>
    <script src="{{ URL::asset('assets/sweetalert2/dist/sweetalert2.min.js') }}"></script>
  </head>
  <body>    
    <?php 
    $invitationObj = $inviteReturnArr['data'];
    $userProfileObj = $invitationObj->user_profile;
    $userResultObj = $userProfileObj->user;
    ?>
    <!-- Page Content -->
    <section>
      <div class="container">
        <div class="main main-invite">
            <div class="col-sm-4 first_inner">
                <img src="{{ URL::asset('images/misbits-logo.png') }}" class="invite-logo"/>
                <img src="{{ URL::asset('images/code.png') }}" class="code" alt="">
            </div>
            <div class="col-sm-8 second_inner">
              {{ Form::open(array('url' => 'registerName/'.$invitation_hash, 'id' => 'registerName')) }}
                    
                      <div class="name"><p>{{$userResultObj->name}} </p></div>
                      <div class="heading">
                        <h2 class="text-uppercase">
                            Invited you to join<br>
                            {{$userProfileObj->name}}
                        </h2>
                      </div>
                     <div class="next">
                       <p>What should people call you?</p>
                       <input class="text_box" type="text" name="name" id="name" placeholder="Type your public name here" />
                       <a href="javascript:void(0)" class="login-btn" onclick="registerName()">Accept invitation</a>
                     </div>
                     <div class="signing">
                      <p>
                        By signing up, you agree to Misbits <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>
                      </p>
                     <div class="last_inner">
                     <p class="no_capitalization"> If you registered before, <a href="<?php echo url('login') ?>">login here</a></p>
                       </div>
                     </div>
                {{ Form::close() }}
             </div>
        </div>
      </div>
      <script type="text/javascript">

        function checkInvitationUrl(base_url){
            var code = {!! json_encode($inviteReturnArr['code']) !!}
            var message = {!! json_encode($inviteReturnArr['message']) !!}
            var title = {!! json_encode($inviteReturnArr['title']) !!}
            if(code==0){
              swal({
                  title: title,
                  text: message,
                  type: "error"
              }, function() {
                  alert('test');
              });
            }
        }

        $( document ).ready(function() {
          var base_url = {!! json_encode(url('/')) !!}
          checkInvitationUrl(base_url);
        });
      </script>
    </section>
  </body>
</html>