<div class="modal fade" id="createProfileModal" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>  
        <h4>Profile Configuration</h4>        
      </div>
      <div class="modal-body">
        {{ Form::open(array('url' => 'user/addProfile', 'id' => 'addProfile', 'files' => true)) }}
          <div class="profile_cont">


            <!-- Profile name -->
            <div class="row">
              <div class="col-sm-12">
                {{ Form::label('name', 'Name:') }}
                {{ Form::text('name', null, array('id' => 'name', 'required'=> true, 'placeholder'=>'Name')) }}
              </div>
            </div>
            <br><br>

            <div class="row">
                <!-- Profile Image -->
                <div class="col-sm-4">
                  {{ Form::label('profile_image', 'Profile Image:') }}
                  <div id="imageUploadBlock">
                    {{ Form::file('profile_image', ['id' => 'profile_image']) }}
                  </div>
                </div>


                <!-- Profile Image -->
                <div class="col-sm-4">
                  <!-- Cover Image -->
                  {{ Form::label('cover_image', 'Cover Image:') }}
                  <div id="coverImageUploadBlock">
                    {{ Form::file('cover_image', ['id' => 'cover_image']) }}
                  </div>
                </div>

                <!-- Profile Image -->
                <div class="col-sm-4">
                  <!-- Profile Background Image -->
                  {{ Form::label('profile_background_image', 'Background Image:') }}
                  <div id="profileBackgroundUploadBlock">
                    {{ Form::file('profile_background_image', ['id' => 'profile_background_image']) }}
                  </div>
                </div>
            </div>
            <br><br>
            <!-- profile description -->

            <div class="row">
              <div class="col-sm-12">
                {{ Form::label('description', 'Enter a Description of Yourself here:') }}
                {{ Form::textarea('description', null, array('id' => 'description', 'required'=> true, 'placeholder'=>'Description')) }}
              </div>
            </div>

            <!-- Colors -->
            <div class="row">
                <div class="col-sm-6">
                  <?php $title_color = '#000000'; ?>
                  {{ Form::text('title_color', $title_color, array('id' => 'title_color', 'required'=> true, 'placeholder'=>'Title Color', 'required'=>'required')) }}
                </div>
                <div class="col-sm-6">
                  <?php $description_color = '#000000'; ?>
                  {{ Form::text('description_color', $description_color, array('id' => 'description_color', 'required'=> true, 'placeholder'=>'Description Color', 'required'=>'required')) }}
                </div>
            </div>

            <input type="submit" value="Save">
          </div>
        {{ Form::close() }}
      </div>
    </div>
  </div>
</div>