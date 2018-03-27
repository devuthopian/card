<div class="modal fade" id="verifyPopupModal" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>  
        <h4>{{$profile->user->name}}</h4>        
      </div>
      <div class="modal-body">
        @if(!empty($profile->user->linked_social_accounts) && (count($profile->user->linked_social_accounts)>0))
        <div class="row">
            @foreach($profile->user->linked_social_accounts as $linkedSocialAccount)
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

              <span class="col-sm-6" style="text-align: center;">
                <label class="col-sm-10" style="background-color:{{$background_color}} !important; color:#fff !important; padding: 10px;">
                  <p class="social_icon">
                    <i class="{{$social_icon}}"></i>&nbsp;
                    {{$linkedSocialAccount->name}}
                    (Verified)
                  </p>
                </label>
              </span>

          @endforeach

          @if(!empty($profile->user->mobile_verified))

              <span class="col-sm-6" style="text-align: center;">
                <label class="col-sm-10" style="background-color:#666 !important; color:#fff !important; padding: 10px;">
                  <p class="social_icon">
                    <i class="fas fa-mobile-alt"></i>&nbsp;
                    SMS Verified
                  </p>
                </label>
              </span>
                <!-- Twitter -->
            </div>
        @endif

          </div>
        @endif
      </div>
    </div>
  </div>
</div>