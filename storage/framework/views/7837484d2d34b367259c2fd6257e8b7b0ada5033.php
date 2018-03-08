<div class="modal fade" id="createProfileModal" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>  
        <h4>Profile Configuration</h4>        
      </div>
      <div class="modal-body">
        <?php echo e(Form::open(array('url' => 'user/addProfile', 'id' => 'addProfile', 'files' => true))); ?>

          <div class="profile_cont">
            <!-- Profile Name -->
            <?php echo e(Form::label('name', 'Name:')); ?>

            <?php echo e(Form::text('name', null, array('id' => 'name', 'required'=> true, 'placeholder'=>'Name'))); ?>



            <!-- Profile Image -->
            <?php echo e(Form::label('profile_image', 'Profile Image:')); ?>

            <div id="fileUploadBlock">
              <?php echo e(Form::file('profile_image', ['id' => 'profile_image'])); ?>

            </div>
            <br><br>

            <?php echo e(Form::label('description', 'Enter a Description of Yourself here:')); ?>

            <?php echo e(Form::textarea('description', null, array('id' => 'description', 'required'=> true, 'placeholder'=>'Description'))); ?>

            
            <input type="submit" value="Save">
          </div>
        <?php echo e(Form::close()); ?>

      </div>
    </div>
  </div>
</div>