<?php $userProfilesObj = $userDetailsObj->user_profiles; ?>
@if(count($userProfilesObj)>0)
<div class="row card-parent">
    @foreach ($userProfilesObj as $key => $userProfile)
        <div class="card bordered shadowed" id="profile_<?php echo $userProfile->id ?>">
            <div class="card-content">
                <div class="card-top">
                    
                    <p class="card-title">{{$userProfile->name}}</p>
                </div>
                <!--end card-top-->
                <div class="card-bottom">
                    <p>
                        @if(strlen($userProfile->description)>100)
                        <?php $description = substr($userProfile->description,0,100).'.....';  ?>
                        @else
                        <?php $description = $userProfile->description; ?>
                        @endif
                        {{$description}}
                    </p>
                </div>
                <!--end card-bottom-->
            </div>
            <!--end card-content-->
            <?php if(!empty($userProfile->profile_image)){ ?>
                <img src="{{ URL::asset('public/uploads/user/profile') }}/{{$userProfile->profile_image}}" alt="" />
            <?php }else{ ?>
                <img src="{{ URL::asset('public/images/avtar.jpg') }}" alt="" />
            <?php } ?>

            <!-- Options -->
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
    @endforeach
</div>
@else
    <div class="text-center">Profiles not available</div>
@endif