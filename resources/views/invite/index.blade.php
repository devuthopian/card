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
        <div class="main">
            <div class="col-sm-4 first_inner">
            <img src="{{ URL::asset('images/logo1.png') }}" class="logo" alt="">
            <img src="{{ URL::asset('images/code.jpg') }}" class="code" alt="">
            </div>
            <div class="col-sm-8 second_inner">
              {{ Form::open(array('url' => 'registerName/'.$invitation_id, 'id' => 'registerName')) }}
                
                  
                     <div class="name"><p>{{$userResultObj->name}} </p></div>
                     <div class="heading">Invited you to join <br><span>{{$userProfileObj->name}} Club</span></div>
                     <div class="next">
                       <p>What should people call you</p>
                       <input class="text_box" type="text" name="name" id="name" />
                       <a href="javascript:void(0)" onclick="registerName()"><img src="{{ URL::asset('images/play.png') }}" class="play" alt=""></a>
                     </div>
                     <div class="signing">
                     <p>By Signing up.you agree to Misbites Terms of Services and Privacy policy.</p>
                     <div class="last_inner">
                     <h2> If You registred before, login</h2>
                       <a href="<?php echo url('login') ?>"><img src="{{ URL::asset('images/botom.png') }}" class="play-botom" alt=""></a>
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