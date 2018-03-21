<div class="modal fade" id="createCardModal" role="dialog">
  <div class="modal-dialog modal-lg n_card_editor">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>  
        <h4 id="create_card_header">New Card</h4>        
      </div>
      <div class="modal-body">
            <div class="row">
                <div class="editor_nav_left">
                    <ul class="nav nav-tabs tabs-left" role="tablist">
                        <li class="active"><a href="#general" data-toggle="tab">General</a></li>
                        <li><a href="#profile" data-toggle="tab">Layout</a></li>
                        <li><a href="#messages" data-toggle="tab">Colors</a></li>
                        <li><a href="#type_names" data-toggle="tab">Type Names</a></li>
                        <li><a href="#tier" data-toggle="tab">Tier Names</a></li>
                    </ul>
                </div>
                <div class="editor_content_right">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="general">
                            {{ Form::open(array('url' => 'user/card/add', 'id' => 'createCard', 'files' => true)) }}
                            <div class="profile_cont card_editor_cont">
                              <div class="card_editor_left">                                
                                <div class="fields_left">
                                    <div>
                                        <span>                        
                                            <a href="javascript:void(0)" onclick="return cardeditor('card_name')" class=""><i class="fa fa-window-close" aria-hidden="true"></i></a>
                                            {{ Form::text('card_name', null, array('id' => 'card_name', 'required'=> true, 'placeholder'=>'Card Name')) }}
                                        </span>
                                    </div>
                                    <div>
                                        <span>
                                            <a href="javascript:void(0)" onclick="return cardeditor('bonus')" class=""><i class="fa fa-window-close" aria-hidden="true"></i></a>
                                            {{ Form::text('bonus', null, array('id' => 'bonus', 'required'=> true, 'placeholder'=>'Bonus')) }}
                                        </span>
                                    </div>
                                    <div>
                                        <span>
                                            <a href="javascript:void(0)" onclick="return cardeditor('card_number')" class=""><i class="fa fa-window-close" aria-hidden="true"></i></a>
                                            {{ Form::text('card_number', null, array('id' => 'card_number', 'required'=> true, 'placeholder'=>'Card Number')) }}
                                        </span>
                                    </div>
                                    <div>
                                        <span>
                                            <a href="javascript:void(0)" onclick="return cardeditor('gender')" class=""><i class="fa fa-window-close" aria-hidden="true"></i></a>
                                            {{ Form::text('gender', null, array('id' => 'gender', 'required'=> true, 'placeholder'=>'Gender')) }}
                                        </span>
                                    </div>
                                    <div>
                                        <span>
                                            <a href="javascript:void(0)" onclick="return cardeditor('tier')" class=""><i class="fa fa-window-close" aria-hidden="true"></i></a>
                                            {{ Form::text('card_tier', null, array('id' => 'tier', 'required'=> true, 'placeholder'=>'Card Tier')) }}
                                        </span>
                                    </div>
                                </div>                                
                                <div>
                                    <span class="textarea">   
                                        <a href="javascript:void(0)" onclick="return cardeditor('rewards')" class=""><i class="fa fa-window-close" aria-hidden="true"></i></a>
                                        {{ Form::textarea('rewards', null, array('id' => 'rewards', 'required'=> true, 'placeholder'=>'Rewards')) }}
                                    </span>
                                </div>
                                <div>
                                    <span class="textarea">
                                        <a href="javascript:void(0)" onclick="return cardeditor('card_description')" class=""><i class="fa fa-window-close" aria-hidden="true"></i></a>
                                        {{ Form::textarea('description', null, array('id' => 'card_description', 'required'=> true, 'placeholder'=>'Description')) }}
                                    </span>
                                </div>
                               <!--  <span>
                                  <button class="color_picker">Theme Color Picker</button>
                                </span> -->
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
                                <div class="fields_right">
                                    <input type="file" class="hide" name="image" id="card_image">
                                    <button type="button" class="editor_button" id="card_image_button" >Choose Image</button>
                                    <button type="button" class="editor_button" >Choose Background</button>
                                    <input type="file" class="hide" name="mask_image" id="mask_image">
                                    <button type="button" class="editor_button" id="mask_image_button">Choose Mask</button>
                                </div>
                              </div>
                              <hr>
                            <div class="popup-footer">
                                {{ Form::hidden('user_profile_id', $profile->id, array('id' => 'user_profile_id')) }}
                                {{ Form::hidden('card_id', null, array('id' => 'card_id')) }}
                                {{ Form::hidden('copy_card_id', null, array('id' => 'copy_card_id')) }}
                                {{ Form::submit('Save',array('class' => 'btn btn-large')) }}
                            </div>
                          </div>
                          {{ Form::close() }}
                        </div>
                        <div class="tab-pane fade" id="profile">profile tab</div>
                        <div class="tab-pane fade" id="messages">messages tab</div>
                        <div class="tab-pane fade" id="type_names">
                            {{ Form::open(array('url' => 'user/card/add', 'id' => 'createCard', 'files' => true)) }}
                            <div class="profile_cont card_editor_cont">
                                <div class="card_editor_left">
                                    <div class="fields_left">
                                        <div>
                                            <span>                        
                                                {{ Form::text('card_name', 'A', array('id' => 'card_name', 'required'=> true, 'placeholder'=>'Card Name')) }}
                                            </span>
                                        </div>
                                        <div>
                                            <span>                        
                                                {{ Form::text('card_name', 'B', array('id' => 'card_name', 'required'=> true, 'placeholder'=>'Card Name')) }}
                                            </span>
                                        </div>
                                        <div>
                                            <span>                        
                                                {{ Form::text('card_name', 'G', array('id' => 'card_name', 'required'=> true, 'placeholder'=>'Card Name')) }}
                                            </span>
                                        </div>
                                        <div>
                                            <span>                        
                                                {{ Form::text('card_name', 'F', array('id' => 'card_name', 'required'=> true, 'placeholder'=>'Card Name')) }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{ Form::close() }}
                        </div>
                        <div class="tab-pane fade" id="tier">setting tabs</div>
                    </div>
                </div>
      </div>
  </div>
</div>