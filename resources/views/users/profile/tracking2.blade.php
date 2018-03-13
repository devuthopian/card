@extends('users.layouts.profile')
@section('content')
<?php $loggedUserDefaultProfile = $userResultObj->default_user_profile; ?>
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
                <!-- HTML -->
                <div class="tracking_cont">
                    <div class="tracker_head">
                        <?php if(!empty($loggedUserDefaultProfile->profile_image)){ ?>
                            <img src="{{ URL::asset('uploads/user/profile/') }}/{{$loggedUserDefaultProfile->profile_image}}">
                        <?php }else{ ?>
                            <img src="{{ URL::asset('images/avtar.jpg') }}">
                        <?php } ?>
                       <h1>{{$userResultObj->name}} is Tracking</h1>
                       <h2>28 <span>Tracking</span></h2>
                    </div>
                    <?php $user_inc = 1; ?>
                    @foreach($userResultObj->user_profiles as $userProfileObj)
                        @foreach($userProfileObj->invitations as $invitationObj)
                            @foreach($invitationObj->users as $userObj)
                                <?php $defaultUserProfile = $userObj->default_user_profile; ?>
                                        <div class="tracker_head_sec">
                                            <div class="head_sec_cont">
                                                <span class="dropdown_icon collapsed" data-toggle="collapse" data-target="#cards<?php echo $user_inc; ?>"><i class="fas fa-angle-down"></i></span>
                                                <div class="head_sec_img">
                                                    <?php if(!empty($defaultUserProfile->profile_image)){ ?>
                                                        <img src="{{ URL::asset('uploads/user/profile/') }}/{{$defaultUserProfile->profile_image}}">
                                                    <?php }else{ ?>
                                                        <img src="{{ URL::asset('images/avtar.jpg') }}">
                                                    <?php } ?>
                                                </div>
                                                <div class="head_sec_name">
                                                    <h2>{{$userObj->name}}</h2>
                                                    <?php $userCardsResultObj = $userObj->released_cards; ?>
                                                    <h3>Released {{$userCardsResultObj->count()}} Cards</h3>                        
                                                </div>
                                                <div class="head_sec_detail">
                                                    <p><span>Activity 
                                                    <?php
                                                    
                                                        $last_login_date = date('d/m/Y', strtotime($userObj->last_login));
                                                        if($last_login_date == date('d/m/Y')) {
                                                          $last_login_date = 'Today';
                                                        } else if($last_login_date == date('d/m/Y', strtotime(now()) - (24 * 60 * 60))) {
                                                          $last_login_date = 'Yesterday';
                                                        }
                                                            
                                                        echo date('G:i', strtotime($userObj->last_login)).' '.$last_login_date;
                                                    ?>
                                                    </span></p>
                                                    <p>{{$defaultUserProfile->description}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cards_cont">
                                            <div id="cards<?php echo $user_inc; ?>" class="collapse">
                                                <?php 
                                                    $userProfilesObj = $userObj->user_profiles;
                                                    $card_inc = 0;
                                                ?>
                                                @foreach($userProfilesObj as $profileObj)
                                                    @foreach($profileObj->released_cards as $cardObj)
                                                        <div class="n_cards" style="cursor: pointer !important;" onclick="goToProfile(<?php echo $cardObj->user_profile_id; ?>)">

                                                            <span class="n_cards_title">{{$cardObj->card_name}}</span>

                                                            <img src="{{ URL::asset('uploads/card/') }}/{{$cardObj->image}}" alt="">
                                                            
                                                            <span class="n_cards_img hide" ><img src="{{ URL::asset('images/acquired.png') }}" alt=""></span>
                                                        </div>
                                                        <?php $card_inc++ ?>
                                                    @endforeach
                                                @endforeach
                                                @if($card_inc==0)
                                                    No Cards Available
                                                @endif
                                            </div>
                                        </div>
                                        <?php $user_inc++; ?>
                                @endforeach
                            @endforeach
                        @endforeach
                </div>
                <!-- HTML - END -->
            </div>
        </div>
    </div>
</body>
@endsection
@section('scripts')
<script src="{{ asset('js/users/profile/tracking.js') }}"></script>
@endsection