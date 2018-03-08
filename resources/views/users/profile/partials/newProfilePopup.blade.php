<div class="modal fade" id="createProfileModal" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>  
        <h4>Profile Configuration</h4>        
      </div>
      <div class="modal-body">
        {{ Form::open(array('url' => 'user/addProfile', 'id' => 'addProfile', 'files' => true)) }}
          <div class="profile_cont">
            <!-- Profile Name -->
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name', null, array('id' => 'name', 'required'=> true, 'placeholder'=>'Name')) }}


            <!-- Profile Image -->
            {{ Form::label('profile_image', 'Profile Image:') }}
            <div id="fileUploadBlock">
              {{ Form::file('profile_image', ['id' => 'profile_image']) }}
            </div>
            <br><br>

            {{ Form::label('description', 'Enter a Description of Yourself here:') }}
            {{ Form::textarea('description', null, array('id' => 'description', 'required'=> true, 'placeholder'=>'Description')) }}
            
            <input type="submit" value="Save">
          </div>
        {{ Form::close() }}
      </div>
    </div>
  </div>
</div>