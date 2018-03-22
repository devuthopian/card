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
                        <li><a href="#setting" data-toggle="tab">Tier Names</a></li>
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
                                            <a href="javascript:void(0)" onclick="return cardeditor('type_name')" class=""><i class="fa fa-window-close" aria-hidden="true"></i></a>
                                            {{ Form::select('type_name_id', [''=>'--Select Type--']+$typeNamesArr, null, array('id' => 'type_name_id', 'required'=> true)) }}
                                        </span>
                                    </div>
                                    <div>
                                        <span>
                                            <a href="javascript:void(0)" onclick="return cardeditor('tier')" class=""><i class="fa fa-window-close" aria-hidden="true"></i></a>
                                            {{ Form::select('tier_name_id', [''=>'--Select Tier--']+$tierNamesArr, null, array('id' => 'tier_name_id', 'required'=> true)) }}
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
                                                    <div class="card-icon left" id="type_name_label"></div>
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
                                    <div>
                                        <input type="file" class="hide" name="image" id="card_image">
                                        <button type="button" class="btn btn-md" id="card_image_button"><i class="fa fa-plus"></i></button>
                                        <button type="button" class="editor_button"  >Image</button>
                                    </div>
                                    <div>
                                        <input type="file" class="hide" name="background_image" id="background_image">
                                        <button type="button" class="btn btn-md" id="background_image_button"><i class="fa fa-plus"></i></button>
                                        <button type="button" class="editor_button" >Background</button>
                                    </div>
                                    <div>
                                        <input type="file" class="hide" name="mask_image" id="mask_image">
                                        <button type="button" class="btn btn-md" id="mask_image_button"><i class="fa fa-plus"></i></button>
                                        <button type="button" class="editor_button" >Mask</button>
                                    </div>
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
                        <!-- Type Names -->
                        <div class="tab-pane fade" id="type_names">
                            {{ Form::open(array('url' => 'user/typeNames/save', 'id' => 'saveTypeNames')) }}
                            <div class="profile_cont card_editor_cont" style="overflow-y:auto; height: 570px;">
                                <div class="card_editor_left">
                                    <div class="fields_left types_block">
                                        <!-- type_names -->
                                        @if(count($profile->type_names))
                                            @foreach($profile->type_names as $typesNameArr)
                                                <div id="type{{$typesNameArr->value}}_block" class="type_div">
                                                    <span>                        
                                                        {{ Form::text("type[$typesNameArr->value]", $typesNameArr->name, array('id' => "type$typesNameArr->value", 'required'=> true, 'placeholder'=>'Type Name')) }}
                                                    </span>
                                                </div>
                                            @endforeach
                                        @else
                                            <div id="type1_block" class="type_div">
                                                <span>                        
                                                    {{ Form::text('type[1]', null, array('id' => 'type1', 'required'=> true, 'placeholder'=>'Type Name')) }}
                                                </span>
                                            </div>
                                        @endif
                                        <!-- type_names - END -->
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                @if(!empty($profile->type_names) && count($profile->type_names)>0)
                                <?php $type_names_count = count($profile->type_names); ?>
                                @else
                                <?php $type_names_count = 1; ?>
                                @endif
                                {{ Form::hidden('types_count', $type_names_count, array('id' => 'types_count')) }}
                                        
                                <a href="javascript:void(0)" class="btn btn-success" onclick="addNewRow()" class="text-danger">
                                    <i class="fas fa-plus"></i>
                                </a>
                                <a href="javascript:void(0)" class="btn btn-danger" onclick="removeRow()" class="text-danger">
                                    <i class="fas fa-minus"></i>
                                </a>

                                {{ Form::button('Save', array('id'=>'saveType', 'class' => 'btn btn-medium btn-submit', 'onclick'=>'return saveTypes()')) }}

                            </div>
                            {{ Form::close() }}
                        </div>
                        <!-- Tier Names -->
                        <div class="tab-pane fade" id="setting">
                            {{ Form::open(array('url' => 'user/tierNames/save', 'id' => 'saveTierNames')) }}
                            <div class="profile_cont card_editor_cont" style="overflow-y:auto; height: 570px;">
                                <div class="card_editor_left">
                                    <div class="fields_left tiers_block">
                                        <!-- type_names -->
                                        @if(count($profile->tier_names))
                                            @foreach($profile->tier_names as $tiersNameArr)
                                                <div id="tier{{$tiersNameArr->value}}_block" class="tier_div">
                                                    <span>                        
                                                        {{ Form::text("tier[$tiersNameArr->value]", $tiersNameArr->name, array('id' => "tier$tiersNameArr->value", 'required'=> true, 'placeholder'=>'Tier Name')) }}
                                                    </span>
                                                </div>
                                            @endforeach
                                        @else
                                            <div id="tier1_block" class="tier_div">
                                                <span>                        
                                                    {{ Form::text('tier[1]', null, array('id' => 'tier1', 'required'=> true, 'placeholder'=>'Tier Name')) }}
                                                </span>
                                            </div>
                                        @endif
                                        <!-- type_names - END -->
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                @if(!empty($profile->tier_names) && count($profile->tier_names)>0)
                                <?php $tier_names_count = count($profile->tier_names); ?>
                                @else
                                <?php $tier_names_count = 1; ?>
                                @endif
                                {{ Form::hidden('tiers_count', $tier_names_count, array('id' => 'tiers_count')) }}
                                        
                                <a href="javascript:void(0)" class="btn btn-success" onclick="addNewTierRow()" class="text-danger">
                                    <i class="fas fa-plus"></i>
                                </a>
                                <a href="javascript:void(0)" class="btn btn-danger" onclick="removeTierRow()" class="text-danger">
                                    <i class="fas fa-minus"></i>
                                </a>

                                {{ Form::button('Save', array('id'=>'saveTier', 'class' => 'btn btn-medium btn-submit', 'onclick'=>'return saveTiers()')) }}

                            </div>
                            {{ Form::close() }}
                        </div>
                        <!-- Tier Names - END -->
                    </div>
                </div>
      </div>
  </div>
</div>