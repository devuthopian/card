<?php $userProfilesObj = $userDetailsObj->user_profiles; ?>
@if(count($userProfilesObj)>0)
<?php $i=0; ?>
    @foreach ($userProfilesObj as $key => $userProfile)
        <div class="col-sm-6 col-md-4 block-container" id="profile_<?php echo $userProfile->id ?>">
            <div class="pop_up">
                <h2> {{$userProfile->name}}</h2>
                

                <?php if(!empty($userProfile->profile_image)){ ?>
                    <img src="{{ URL::asset('uploads/user/profile') }}/{{$userProfile->profile_image}}" alt="" style="min-height: 400px;">
                <?php }else{ ?>
                    <img src="{{ URL::asset('images/avtar.jpg') }}" alt="" style="min-height: 400px;">
                <?php } ?>


                <div class="content_caption">
                    <h4> <span>{{$userProfile->description}}</span></h4>
                </div>
                <div class="hover_pop">
                    <ul>
                        <li>&nbsp;</li>
                        <li><a href="<?php echo url('user/index', $userProfile->id) ?>">View</a></li>

                        <?php $setDefaultClass = $removeProfileClass = ''; ?>
                        @if(!empty($userProfile->is_default))
                        <?php $setDefaultClass = $removeProfileClass = 'hide'; ?>
                        @endif
                        
                        @if(count($userProfilesObj)>1)
                        <li id="removeProfileButton<?php echo $userProfile->id ?>" class="{{$removeProfileClass}} removeProfileButtons">
                            <a href="javascript:void()" onclick="removeProfile('<?php echo $userProfile->id ?>')">Remove</a>
                        </li>
                        @endif
                        <li id="defaultProfileButton<?php echo $userProfile->id ?>" class="{{$setDefaultClass}} setDefaultButtons">
                            <a href="javascript:void()" onclick="setDefaultProfile('<?php echo $userProfile->id ?>')">Set Default</a>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </div>
        <?php $i++; ?>
        @if($i%3==0)
        <div class="clearfix"></div>
        @endif
    @endforeach
@else
    <div class="text-center">Profiles not available</div>
@endif