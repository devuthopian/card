<div class="modal fade" id="editProfileModal" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>  
        <h4>Profile Configuration</h4>        
      </div>
      <div class="modal-body">
        {{ Form::open(array('url' => 'user/editProfile', 'id' => 'editProfile', 'files' => true)) }}
          <div class="profile_cont">

            <!-- Profile name -->
            <label>Profile Name:</label> 
            <input type="text" name="name" id="name" value="{{ $userDetails->user_profile->name }}" required />


            <!-- Profile image -->
            <label>Profile Image</label> 
            <?php 
            $file_hide_class = '';
            if(!empty($userDetails->user_profile->profile_image)){
              $file_hide_class = 'hide';
            } ?>
            
            <div id="fileUploadBlock" class="<?php echo $file_hide_class ?>">
              <input type="file" name="profile_image" id="profile_image" />
            </div>

            <?php if(!empty($userDetails->user_profile->profile_image)){ 
              $profile_image = $userDetails->user_profile->profile_image;
              ?>
              <div id="imageBlock">
                <img src="{{ URL::asset('public/uploads/user/profile/profileImages') }}/{{$profile_image}}" width="100px" /><br><br>
                <a href="javascript:void(0)" onclick="return editProfileImage()"><i class="fa fa-edit"></i> Change</a>
              </div>
            <?php } ?>
            <br><br>


            <!-- Cover image -->
            <label>Cover Image</label> 
            <?php 
            $cover_image_hide_class = '';
            if(!empty($userDetails->user_profile->cover_image)){
              $cover_image_hide_class = 'hide';
            } ?>
            
            <div id="coverImageUploadBlock" class="<?php echo $cover_image_hide_class ?>">
              <input type="file" name="cover_image" id="cover_image" />
            </div>

            <?php if(!empty($userDetails->user_profile->cover_image)){ 
              $cover_image = $userDetails->user_profile->cover_image;
              ?>
              <div id="coverImageBlock">
                <img src="{{ URL::asset('public/uploads/user/profile/coverImages') }}/{{$cover_image}}" width="100px" /><br><br>
                <a href="javascript:void(0)" onclick="return editProfileImage()"><i class="fa fa-edit"></i> Change</a>
              </div>
            <?php } ?>
            <br><br>

            <!-- Profile Description -->
            <label>Enter a Description of Yourself here:</label>
            <textarea name="description" id="description" required>{{ $userDetails->user_profile->description }}</textarea>
            
            <input type="hidden" name="profile_id" id="profile_id" value="{{ $userDetails->user_profile->id }}">
            <input type="submit" value="Save">
          </div>
        {{ Form::close() }}
      </div>
    </div>
  </div>
</div>