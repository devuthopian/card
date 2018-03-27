<div class="modal fade" id="editProfileModal" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>  
        <h4>Edit Profile</h4>        
      </div>
      <div class="modal-body">
        {{ Form::open(array('url' => 'user/editProfile', 'id' => 'editProfile', 'files' => true)) }}
          <div class="profile_cont">

            <!-- Profile name -->
            <div class="row">
              <div class="col-sm-12">
                <label>Profile Name:</label> 
                <input type="text" name="name" id="name" value="{{ $profile->name }}" required />
              </div>
            </div>
            <br><br>
            <div class="row">
                <!-- Profile image -->
                <div class="col-sm-4">
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
                        <img src="{{ URL::asset('uploads/user/profile/profileImages') }}/{{$profile_image}}" width="150px" /><br><br>
                        <a href="javascript:void(0)" onclick="return editProfileImage()"><i class="fa fa-edit"></i> Change</a>
                      </div>
                    <?php } ?>
                </div>

                <!-- Cover image -->
                <div class="col-sm-4">
                    <label>Cover Image</label> 
                    <?php 
                    $cover_image_hide_class = '';
                    if(!empty($profile->cover_image)){
                      $cover_image_hide_class = 'hide';
                    } ?>
                    
                    <div id="coverImageUploadBlock" class="<?php echo $cover_image_hide_class ?>">
                      <input type="file" name="cover_image" id="cover_image" />
                    </div>

                    <?php if(!empty($profile->cover_image)){ 
                      $cover_image = $profile->cover_image;
                      ?>
                      <div id="coverImageBlock">
                        <img src="{{ URL::asset('uploads/user/profile/coverImages') }}/{{$cover_image}}" width="150px" /><br><br>
                        <a href="javascript:void(0)" onclick="return editCoverImage()"><i class="fa fa-edit"></i> Change</a>
                      </div>
                    <?php } ?>
                </div>

                <!-- Background image -->
                <div class="col-sm-4">
                    <label>Background Image</label> 
                    <?php 
                    $background_image_hide_class = '';
                    if(!empty($profile->profile_background_image)){
                      $background_image_hide_class = 'hide';
                    } ?>
                    
                    <div id="backgroundImageUploadBlock" class="<?php echo $background_image_hide_class ?>">
                      <input type="file" name="profile_background_image" id="profile_background_image" />
                    </div>

                    <?php if(!empty($profile->profile_background_image)){ 
                      $profile_background_image = $profile->profile_background_image;
                      ?>
                      <div id="backgroundImageBlock">
                        <img src="{{ URL::asset('uploads/user/profile/backgroundImages') }}/{{$profile_background_image}}" width="150px" /><br><br>
                        <a href="javascript:void(0)" onclick="return editBackgroundImage()"><i class="fa fa-edit"></i> Change</a>
                      </div>
                    <?php } ?>
                </div>
            </div>
            <br><br>
            <!-- profile description -->

            <div class="row">
              <div class="col-sm-12">
                <label>Enter a Description of Yourself here:</label>
                <textarea name="description" id="description" required>{{ $profile->description }}</textarea>
              </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                  
                  <?php $title_color = '#000000'; ?>
                  @if(!empty($profile->title_color))
                  <?php $title_color = $profile->title_color; ?>
                  @endif
                  
                  {{ Form::text('title_color', $title_color, array('id' => 'title_color', 'required'=> true, 'placeholder'=>'Title Color', 'required'=>'required')) }}
                </div>
                <div class="col-sm-6">

                  <?php $description_color = '#000000'; ?>
                  @if(!empty($profile->description_color))
                  <?php $description_color = $profile->description_color; ?>
                  @endif


                  {{ Form::text('description_color', $description_color, array('id' => 'description_color', 'required'=> true, 'placeholder'=>'Description Color', 'required'=>'required')) }}
                </div>
            </div>
            
            <input type="hidden" name="profile_id" id="profile_id" value="{{ $profile->id }}">
            <input type="submit" value="Save">
          </div>
        {{ Form::close() }}
      </div>
    </div>
  </div>
</div>