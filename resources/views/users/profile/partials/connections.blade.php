<?php 
    $user = Auth::user(); 
?>
<div class="tabs {{$connections_hide_class}}" id="connections">
    <div class="tracking_cont_left">
        <h2>Connections</h2>
        <div class="row">
        	<div class="col-sm-12">
        		<!-- Twitter -->
                <a href="javascript:void(0)" onclick="openAuthenticationPopup('twitter')" class="btn btn-social-icon btn-twitter"><i class="fab fa-twitter"></i></a>

                <!-- Youtube -->
                <a href="javascript:void(0)" onclick="openAuthenticationPopup('youtube')" class="btn btn-social-icon btn-google"><i class="fab fa-youtube"></i></a>
                <!-- SMS -->
                @if(empty($user->mobile_verified))
                <a class="sms_link" data-toggle="modal" href="javascript:void(0)" data-target="#otpVerificationModal" class="btn btn-social-icon"  style="color:#fff; text-align:center; vertical-align: middle;">SMS</a>
                @endif
        	</div>
        </div>
    </div>
    <br>
    
    @foreach($user->linked_social_accounts as $linkedSocialAccount)

        @if($linkedSocialAccount->provider_name=='twitter')
        <?php 
            $social_border_class = 'twitter_border';
            $background_color = 'rgb(29, 161, 242)'; 
            $social_icon = 'fab fa-twitter';
            $social_button_class = 'btn btn-social-icon btn-twitter';
        ?>
        @elseif($linkedSocialAccount->provider_name=='facebook')
        <?php 
            $social_border_class = 'facebook_border';
            $background_color = 'rgb(53, 80, 137)'; 
            $social_icon = 'fab fa-facebook';
            $social_button_class = 'btn btn-social-icon btn-facebook';
        ?>
        @elseif($linkedSocialAccount->provider_name=='youtube')
        <?php 
            $social_border_class = 'youtube_border';
            $background_color = 'rgb(203, 33, 32)'; 
            $social_icon = 'fab fa-youtube';
            $social_button_class = 'btn btn-social-icon btn-youtube';
        ?>
        @endif
        @if($linkedSocialAccount->provider_name!='instagram')
        <div style="background-color:{{$background_color}} !important; color:#fff !important; height: 200px !important;" class="tracking_cont_left" >
            
            <div href="javascript:void(0)" >
                <div class="social_icon {{$social_border_class}}"><i class="{{$social_icon}}"></i></div>
                <div class="social_details">
                    <p>{{$linkedSocialAccount->name}}</p>
                    <small>Account Name</small>
                </div>
            </div>            
            <!-- Twitter -->
        
        </div>
        @endif
        <br>
    @endforeach

    @if(!empty($user->mobile_verified))
        <div style="background-color:#666 !important; color:#fff !important; height: 200px !important;" class="tracking_cont_left" >
            
            <div href="javascript:void(0)" >
                <div class="social_icon sms_border"><i class="fas fa-mobile-alt"></i></div>
                <div class="social_details">
                    {{$user->mobile_verified->mobile_number}}
                    SMS Verified ({{$user->mobile_verified->mobile_number}})
                </div>
            </div>            
            <!-- Twitter -->
        
        </div>
    @endif
</div>