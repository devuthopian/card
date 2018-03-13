<div class="modal fade" id="editProfileModal" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>  
        <h4>Edit Profile</h4>        
      </div>
      <div class="modal-body">
        {{ Form::open(array('url' => 'user/editProfile', 'id' => 'editProfile', 'files' => true)) }}
          <div class="profile_cont">

            <label>Profile Name:</label> 
            <input type="text" name="name" id="name" value="{{ $profile->name }}" required />

            <label>Profile Image</label> 
            <?php 
            $file_hide_class = '';
            if(!empty($profile->profile_image)){
              $file_hide_class = 'hide';
            } ?>
            
            <div id="fileUploadBlock" class="<?php echo $file_hide_class ?>">
              <input type="file" name="profile_image" id="profile_image" />
            </div>

            <?php if(!empty($profile->profile_image)){ 
              $profile_image = $profile->profile_image;
              ?>
              <div id="imageBlock">
                <img src="{{ URL::asset('uploads/user/profile/') }}/{{$profile_image}}" width="100px" /><br><br>
                <a href="javascript:void(0)" onclick="return editProfileImage()"><i class="fa fa-edit"></i> Change</a>
              </div>
            <?php } ?>
            <br><br>

            <label>Enter a Description of Yourself here:</label>
            <textarea name="description" id="description" required>{{ $profile->description }}</textarea>
            
            <input type="hidden" name="profile_id" id="profile_id" value="{{ $profile->id }}">
            <input type="submit" value="Save">
          </div>
        {{ Form::close() }}
      </div>
    </div>
  </div>
</div>