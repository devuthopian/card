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
                <a href="<?php echo url('auth/youtube') ?>" class="btn btn-social-icon" style="background-color:#ccc; color:#fff; text-align:center; vertical-align: middle;">SMS</a>
        	</div>
        </div>
    </div>
    <br>
    <?php 
        $user = Auth::user(); 
    ?>
    @foreach($user->linked_social_accounts as $linkedSocialAccount)

        @if($linkedSocialAccount->provider_name=='twitter')
        <?php 
            $background_color = 'rgb(29, 161, 242)'; 
            $social_icon = 'fab fa-twitter';
            $social_button_class = 'btn btn-social-icon btn-twitter';
        ?>
        @elseif($linkedSocialAccount->provider_name=='facebook')
        <?php 
            $background_color = 'rgb(53, 80, 137)'; 
            $social_icon = 'fab fa-facebook';
            $social_button_class = 'btn btn-social-icon btn-facebook';
        ?>
        @elseif($linkedSocialAccount->provider_name=='youtube')
        <?php 
            $background_color = 'rgb(203, 33, 32)'; 
            $social_icon = 'fab fa-youtube';
            $social_button_class = 'btn btn-social-icon btn-youtube';
        ?>
        @endif

        <div style="background-color:{{$background_color}} !important; color:#fff !important; height: 200px !important;" class="tracking_cont_left" >
            
            <div href="javascript:void(0)" >
                <i class="{{$social_icon}}"></i>
            </div>
            <br><br>
            
            <!-- Twitter -->
            <p>{{$linkedSocialAccount->name}}</p>
            <small>Account Name</small>


        </div>
        <br>
    @endforeach
</div>