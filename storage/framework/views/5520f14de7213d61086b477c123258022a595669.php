<div class="modal fade" id="createCardModal" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>  
        <h4 id="create_card_header">New Card</h4>        
      </div>
      <div class="modal-body">
        <?php echo e(Form::open(array('url' => 'user/card/add', 'id' => 'createCard', 'files' => true))); ?>

          <div class="profile_cont">

            <!-- Card Name -->
            <?php echo e(Form::label('card_name', 'Card Name:')); ?>

            <?php echo e(Form::text('card_name', null, array('id' => 'card_name', 'required'=> true, 'placeholder'=>'Card Name'))); ?>

            <!-- Card Name - END -->

            <!-- Card Image -->
            <?php echo e(Form::label('image', 'Card Image:')); ?>

            <div id="cardFileUploadBlock">
              <?php echo e(Form::file('image', ['id' => 'image'])); ?>

            </div>

            <div id="cardImageBlock" class="hide">
              <img id="card_image" src="" width="100px" /><br><br>
              <a href="javascript:void(0)" onclick="return editCardImage()"><i class="fa fa-edit"></i> Change</a>
            </div>
            <br>
            <!-- Card Image - END -->

            <!-- Card Description -->
            <?php echo e(Form::label('description', 'Description:')); ?>

            <?php echo e(Form::textarea('description', null, array('id' => 'description', 'required'=> true, 'placeholder'=>'Description'))); ?>

            <!-- Card Description - END -->
            
            <?php echo e(Form::hidden('user_profile_id', $profile->id, array('id' => 'user_profile_id'))); ?>

            <?php echo e(Form::hidden('card_id', null, array('id' => 'card_id'))); ?>

            <?php echo e(Form::hidden('copy_card_id', null, array('id' => 'copy_card_id'))); ?>

            <?php echo e(Form::submit('Save')); ?>

          </div>
        <?php echo e(Form::close()); ?>

      </div>
    </div>
  </div>
</div>