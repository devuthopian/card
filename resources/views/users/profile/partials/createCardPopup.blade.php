<div class="modal fade" id="createCardModal" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>  
        <h4 id="create_card_header">New Card</h4>        
      </div>
      <div class="modal-body">
        {{ Form::open(array('url' => 'user/card/add', 'id' => 'createCard', 'files' => true)) }}
          <div class="profile_cont card_editor_cont">
              <div class="card_editor_left">
                <div class="fields_left">
                  <div>
                    <span>
                      {{ Form::text('card_name', null, array('id' => 'card_name', 'required'=> true, 'placeholder'=>'Card Name')) }}
                    </span>
                  </div>
                  <span>
                    {{ Form::text('bonus', null, array('id' => 'bonus', 'required'=> true, 'placeholder'=>'Bonus')) }}
                  </span>
                  <span>
                    {{ Form::text('card_number', null, array('id' => 'card_number', 'required'=> true, 'placeholder'=>'Card Number')) }}
                  </span>
                  <span>
                    {{ Form::text('gender', null, array('id' => 'gender', 'required'=> true, 'placeholder'=>'Gender')) }}
                  </span>
                  <span>
                    {{ Form::text('card_tier', null, array('id' => 'tier', 'required'=> true, 'placeholder'=>'Card Tier')) }}
                  </span>
                </div>
                <div class="fields_right">
                    <input type="file" class="hide" name="image" id="card_image">
                    <button type="button" class="editor_button" id="card_image_button" >Choose Image</button>
                    <button type="button" class="editor_button" >Choose Background</button>
                    <input type="file" class="hide" name="mask_image" id="mask_image">
                    <button type="button" class="editor_button" id="mask_image_button">Choose Mask</button>
                </div>
                <span class="textarea">
                  {{ Form::textarea('rewards', null, array('id' => 'rewards', 'required'=> true, 'placeholder'=>'Rewards')) }}
                </span>
                <span class="textarea">
                  {{ Form::textarea('description', null, array('id' => 'card_description', 'required'=> true, 'placeholder'=>'Description')) }}
                </span>
                <span>
                  <button class="color_picker">Theme Color Picker</button>
                </span>
              </div>
              <div class="card_editor_right">
                  <div class="row card-parent">
                    <div class="card bordered shadowed" style="height: 375px;">
                        <div class="card-content">
                            <div class="card-top">
                                <div class="rosette left">
                                    <p id="bonus_label"></p>
                                </div>
                                <p class="card-title" id="card_name_label"></p>
                                <p class="card-points right" id="card_number_label"></p>
                            </div>
                            <!--end card-top-->
                            <div class="card-bottom">
                                <div class="row">
                                    <div class="card-icon left" id="gender_label"></div>
                                    <span class="card-points right" id="tier_label"></span>
                                </div>
                                <p class="row">
                                    <b class="left">Rewards</b>
                                    <span class="left" id="rewards_label"></span>
                                </p>
                                <p id="description_label"></p>
                            </div>
                            <!--end card-bottom-->
                        </div>
                        <!--end card-content-->
                        <img id="card_image_preview" src="" alt="Card Image" style="height: 375px;">
                        <img id="mask_image_preview" src="" alt="Mask Image" style="height: 375px;">
                    </div>
                </div>
              </div>
              <hr>
            {{ Form::hidden('user_profile_id', $profile->id, array('id' => 'user_profile_id')) }}
            {{ Form::hidden('card_id', null, array('id' => 'card_id')) }}
            {{ Form::hidden('copy_card_id', null, array('id' => 'copy_card_id')) }}
            {{ Form::submit('Save') }}
          </div>
        {{ Form::close() }}
      </div>
    </div>
  </div>
</div>