<div class="modal fade" id="editProfileModal" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>  
        <h4>Edit Profile</h4>        
      </div>
      <div class="modal-body">
        <?php echo e(Form::open(array('url' => 'user/editProfile', 'id' => 'editProfile', 'files' => true))); ?>

          <div class="profile_cont">

            <label>Profile Name:</label> 
            <input type="text" name="name" id="name" value="<?php echo e($profile->name); ?>" required />

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
                <img src="<?php echo e(URL::asset('public/uploads/user/profile/')); ?>/<?php echo e($profile_image); ?>" width="100px" /><br><br>
                <a href="javascript:void(0)" onclick="return editProfileImage()"><i class="fa fa-edit"></i> Change</a>
              </div>
            <?php } ?>
            <br><br>

            <label>Enter a Description of Yourself here:</label>
            <textarea name="description" id="description" required><?php echo e($profile->description); ?></textarea>
            
            <input type="hidden" name="profile_id" id="profile_id" value="<?php echo e($profile->id); ?>">
            <input type="submit" value="Save">
          </div>
        <?php echo e(Form::close()); ?>

      </div>
      <div class="modal-header">
        <h4>Profile Verification (Optional)</h4> 
        <h5>If you visit to offer </h5>       
      </div>
      <div class="modal-body">
        <div class="profile_cont">
          <label>Select Verification method:</label> 
          <select>
            <option>01</option>
            <option>01</option>
            <option>01</option>
          </select>
           <label>Link to Your twitterlocator</label> <input type="text">
           <label>Verification message shown to your followers:</label>
           <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam sit amet placerat nisi. Aenean condimentum porta est sed pharetra.</p>
           <input type="submit" value="Save">
        </div>
      </div>
    </div>
  </div>
</div>