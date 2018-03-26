<div class="modal fade" id="createCardModal" role="dialog">
  <div class="modal-dialog modal-xl n_card_editor">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>  
        <h4 id="create_card_header">New Card</h4>        
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="editor_nav_left">
                <!-- navigation -->
                <ul class="nav nav-tabs tabs-left" role="tablist">
                    <li class="active"><a href="#general" data-toggle="tab">General</a></li>
                    <li><a href="#profile" data-toggle="tab">Layout</a></li>
                    <li><a href="#messages" data-toggle="tab">Colors</a></li>
                    <li><a href="#type_names" data-toggle="tab">Type Names</a></li>
                    <li><a href="#setting" data-toggle="tab">Tier Names</a></li>
                </ul>
            </div>

            <!-- editor -->
            <div class="editor_content_right">
                <div class="profile_cont card_editor_cont">
                    <div class="card_editor_left">
                        <div class="tab-content">
                            <!-- General Tab -->
                            <div class="tab-pane fade in active" id="general">

                                {{ Form::open(array('url' => 'user/card/add', 'id' => 'createCard', 'files' => true)) }}
                                    <div>                                
                                        <div class="fields_left">
                                            <div>
                                                <span>    
                                                    {{ Form::checkbox('is_card_name', 1, true, array('id'=>'is_card_name')) }}               
                                                    
                                                    {{ Form::text('card_name', null, array('id' => 'card_name', 'placeholder'=>'Card Name')) }}
                                                </span>
                                            </div>
                                            <div>
                                                <span>
                                                    {{ Form::checkbox('is_bonus', 1, true, array('id'=>'is_bonus')) }}

                                                    {{ Form::text('bonus', null, array('id' => 'bonus', 'placeholder'=>'Bonus')) }}
                                                </span>
                                            </div>
                                            <div>
                                                <span>
                                                    {{ Form::checkbox('is_card_value', 1, true, array('id'=>'is_card_value')) }}

                                                    {{ Form::text('card_value', null, array('id' => 'card_value', 'placeholder'=>'Card Number')) }}
                                                </span>
                                            </div>
                                            <div>
                                                <span>
                                                    {{ Form::checkbox('is_type_name', 1, true, array('id'=>'is_type_name')) }}

                                                    {{ Form::select('type_name_id', [''=>'--Select Type--']+$typeNamesArr, null, array('id' => 'type_name_id')) }}
                                                </span>
                                            </div>
                                            <div>
                                                <span>
                                                    {{ Form::checkbox('is_tier_name', 1, true, array('id'=>'is_tier_name')) }}

                                                    {{ Form::select('tier_name_id', [''=>'--Select Tier--']+$tierNamesArr, null, array('id' => 'tier_name_id')) }}
                                                </span>
                                            </div>
                                        </div> 
                                        <div class="fields_right">
                                            <div>
                                            <!-- Fine Uploader Gallery template ======-->
                                            <script type="text/template" id="qq-template-gallery">
                                                <div class="qq-uploader-selector qq-uploader qq-gallery" qq-drop-area-text="Drop files here">
                                                    <div class="qq-total-progress-bar-container-selector qq-total-progress-bar-container">
                                                        <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="qq-total-progress-bar-selector qq-progress-bar qq-total-progress-bar"></div>
                                                    </div>
                                                    <div class="qq-upload-drop-area-selector qq-upload-drop-area" qq-hide-dropzone>
                                                        <span class="qq-upload-drop-area-text-selector"></span>
                                                    </div>
                                                    <div class="qq-upload-button-selector qq-upload-button">
                                                        <div><i class="fa fa-plus"></i></div>
                                                    </div>
                                                    
                                                    <ul class="qq-upload-list-selector qq-upload-list hide" role="region" aria-live="polite" aria-relevant="additions removals">
                                                        <li>
                                                            <span class="qq-upload-spinner-selector qq-upload-spinner"></span>
                                                            <div class="qq-file-info hide">
                                                                <div class="qq-file-name">
                                                                    <span class="qq-upload-file-selector qq-upload-file"></span>
                                                                    <span class="qq-edit-filename-icon-selector qq-edit-filename-icon" aria-label="Edit filename"></span>
                                                                </div>
                                                                <input class="qq-edit-filename-selector qq-edit-filename" tabindex="0" type="text">
                                                                <span class="qq-upload-size-selector qq-upload-size"></span>
                                                                <button type="button" class="qq-btn qq-upload-delete-selector qq-upload-delete">
                                                                    <span class="qq-btn qq-delete-icon" aria-label="Delete"></span>
                                                                </button>
                                                                <button type="button" class="qq-btn qq-upload-pause-selector qq-upload-pause">
                                                                    <span class="qq-btn qq-pause-icon" aria-label="Pause"></span>
                                                                </button>
                                                                <button type="button" class="qq-btn qq-upload-continue-selector qq-upload-continue">
                                                                    <span class="qq-btn qq-continue-icon" aria-label="Continue"></span>
                                                                </button>
                                                            </div>
                                                        </li>
                                                    </ul>

                                                    <dialog class="qq-alert-dialog-selector">
                                                        <div class="qq-dialog-message-selector"></div>
                                                        <div class="qq-dialog-buttons">
                                                            <button type="button" class="qq-cancel-button-selector">Close</button>
                                                        </div>
                                                    </dialog>

                                                    <dialog class="qq-confirm-dialog-selector">
                                                        <div class="qq-dialog-message-selector"></div>
                                                        <div class="qq-dialog-buttons">
                                                            <button type="button" class="qq-cancel-button-selector">No</button>
                                                            <button type="button" class="qq-ok-button-selector">Yes</button>
                                                        </div>
                                                    </dialog>

                                                    <dialog class="qq-prompt-dialog-selector">
                                                        <div class="qq-dialog-message-selector"></div>
                                                        <input type="text">
                                                        <div class="qq-dialog-buttons">
                                                            <button type="button" class="qq-cancel-button-selector">Cancel</button>
                                                            <button type="button" class="qq-ok-button-selector">Ok</button>
                                                        </div>
                                                    </dialog>
                                                </div>
                                            </script>

                                                <div id="image_uploader_gallery" class="btn btn-md btn-yellow"></div>
                                                {{ Form::hidden('image_file_name', null, array('id' => 'image_file_name')) }}
                                                {{ Form::hidden('cropped_image_file_name', null, array('id' => 'cropped_image_file_name')) }}
                                                <input type="file" class="hide" name="image" id="card_image">
                                                <!-- <button type="button" class="btn btn-md btn-yellow" id="card_image_button"><i class="fa fa-plus"></i></button> -->
                                                <button type="button" class="editor_button" onclick="openImageCropPopup()"  >Image</button>
                                            </div>
                                            <div>
                                                <input type="file" class="hide" name="background_image" id="background_image">
                                                <button type="button" class="btn btn-md btn-yellow" id="background_image_button"><i class="fa fa-plus"></i></button>
                                                <button type="button" class="editor_button" >Background</button>
                                            </div>
                                            <div>
                                                <input type="file" class="hide" name="mask_image" id="mask_image">
                                                <button type="button" class="btn btn-md btn-yellow" id="mask_image_button"><i class="fa fa-plus"></i></button>
                                                <button type="button" class="editor_button" >Mask</button>
                                            </div>
                                        </div>   
                                    </div>
                                    <div>
                                        <span class="textarea">   
                                            {{ Form::checkbox('is_rewards', 1, true, array('id'=>'is_rewards')) }}

                                            {{ Form::textarea('rewards', null, array('id' => 'rewards',  'placeholder'=>'Rewards')) }}
                                        </span>
                                    </div>
                                    <div>
                                        <span class="textarea">
                                            {{ Form::checkbox('is_description', 1, true, array('id'=>'is_description')) }}

                                            {{ Form::textarea('description', null, array('id' => 'card_description',  'placeholder'=>'Description')) }}
                                        </span>
                                    </div>
                                    <div class="popup-footer">
                                        {{ Form::hidden('user_profile_id', $profile->id, array('id' => 'user_profile_id')) }}
                                        {{ Form::hidden('card_id', null, array('id' => 'card_id')) }}
                                        {{ Form::hidden('copy_card_id', null, array('id' => 'copy_card_id')) }}
                                        {{ Form::submit('Save',array('class' => 'btn btn-large')) }}
                                    </div>
                                {{ Form::close() }}
                            </div>

                            <!-- Layout Area -->
                            <div class="tab-pane fade" id="profile">
                                <div class="profile_cont card_editor_cont text-center" style="overflow-y:auto; height: 570px;">
                                    <div class="">
                                        <strong>Bonus Style</strong><br>
                                        Enable [X]<br><br>
                                        <label>Shape</label>
                                        <div class="fields_left types_block">
                                            {{ Form::select('bonus_style', [''=>'--Select Type--', 1=>'Hide', 2=>'Award', 3=>'Circle', 4=>'Stadium', 5=>'Rectangle', 6=>'Rounded Rectangle'], null, array('id' => 'bonus_style', 'required'=> true, 'multiple'=>true)) }}
                                        </div>


                                        <div class="clearfix"></div>

                                        {{ Form::button('Save', array('id'=>'saveType', 'class' => 'btn btn-medium btn-submit', 'onclick'=>'return saveTypes()')) }}
                                        <div class="clearfix"></div><br>
                                        {{ Form::button('Apply to All Cards', array('id'=>'saveType', 'class' => 'btn btn-medium btn-submit', 'style'=>'width:80%', 'onclick'=>'return saveTypes()')) }}
                                        </div>
                                        </div>
                            </div>

                            <!-- Message Tab -->
                            <div class="tab-pane fade" id="messages">messages tab</div>
                            
                            <!-- Type Names -->
                            <div class="tab-pane fade" id="type_names">
                                {{ Form::open(array('url' => 'user/typeNames/save', 'id' => 'saveTypeNames')) }}
                                <div class="profile_cont card_editor_cont" style="overflow-y:auto; height: 570px;">
                                    <div class="">
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
                                            
                                    <a href="javascript:void(0)" class="btn btn-success" onclick="addNewTypeRow()" class="text-danger">
                                        <i class="fas fa-plus"></i>
                                    </a>
                                    <a href="javascript:void(0)" class="btn btn-danger" onclick="removeTypeRow()" class="text-danger">
                                        <i class="fas fa-minus"></i>
                                    </a>
                                    <div class="clearfix"></div><br>
                                    {{ Form::button('Save', array('id'=>'saveType', 'class' => 'btn btn-medium btn-submit', 'onclick'=>'return saveTypes()')) }}

                                </div>
                                {{ Form::close() }}
                            </div>

                            <!-- Tier Names -->
                            <div class="tab-pane fade" id="setting">
                                {{ Form::open(array('url' => 'user/tierNames/save', 'id' => 'saveTierNames')) }}
                                <div class="profile_cont card_editor_cont" style="overflow-y:auto; height: 570px;">
                                    <div class="">
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
                                    <div class="clearfix"></div><br>
                                    {{ Form::button('Save', array('id'=>'saveTier', 'class' => 'btn btn-medium btn-submit', 'onclick'=>'return saveTiers()')) }}

                                </div>
                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>

                    <!-- Card Preview -->
                    <div class="card_editor_right">
                        <div class="row card-parent">
                            <div class="card preview_card bordered " style="height: 375px;">
                                <div class="card-content">
                                    <div class="card-top">
                                        <div class="rosette left" id="bonus_block">
                                            <p id="bonus_label"></p>
                                        </div>
                                        <p class="card-title" id="card_name_label"></p>
                                        <p class="card-points right" id="card_value_label"></p>
                                    </div>
                                    <!--end card-top-->
                                    <div class="card-bottom">
                                        <div class="row">
                                            <div class="card-icon left" id="type_name_label"></div>
                                            <span class="card-points right" id="tier_label"></span>
                                        </div>
                                        <p class="row" id="rewards_block">
                                            <b class="left">Rewards</b>
                                            <span class="left" id="rewards_label"></span>
                                        </p>
                                        <p id="description_label"></p>
                                    </div>
                                    <!--end card-bottom-->
                                </div>
                                <!--end card-content-->
                                <img id="card_image_preview" src="" alt="" style="height: 375px;">
                                <img id="mask_image_preview" src="" alt="" style="height: 375px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
      </div>
    </div>
</div>