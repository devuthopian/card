<br><br>
@if(count($cards)>0)
<div class="row card-parent">
    @foreach ($cards as $key => $card)
        <div class="card bordered shadowed" id="card_<?php echo $card->id ?>">
            <div class="card-content">
                <div class="card-top">


                    <!-- bonus hide/show  -->
                    <?php $bonus_hide_class = 'hide'; ?>
                    @if($card->is_bonus)
                    <?php $bonus_hide_class = ''; ?>
                    @endif

                    <!-- card name hide/show  -->
                    <?php $card_name_hide_class = 'hide'; ?>
                    @if($card->is_card_name)
                    <?php $card_name_hide_class = ''; ?>
                    @endif

                    <!-- card number hide/show  -->
                    <?php $card_number_hide_class = 'hide'; ?>
                    @if($card->is_card_number)
                    <?php $card_number_hide_class = ''; ?>
                    @endif

                    <!-- type name hide/show  -->
                    <?php $type_name_hide_class = 'hide'; ?>
                    @if($card->is_type_name)
                    <?php $type_name_hide_class = ''; ?>
                    @endif

                    <!-- tier name hide/show  -->
                    <?php $tier_name_hide_class = 'hide'; ?>
                    @if($card->is_tier_name)
                    <?php $tier_name_hide_class = ''; ?>
                    @endif

                    <!-- rewards hide/show  -->
                    <?php $rewards_hide_class = 'hide'; ?>
                    @if($card->is_rewards)
                    <?php $rewards_hide_class = ''; ?>
                    @endif

                    <!-- description hide/show  -->
                    <?php $description_hide_class = 'hide'; ?>
                    @if($card->is_description)
                    <?php $description_hide_class = ''; ?>
                    @endif




                    <div class="rosette left {{$bonus_hide_class}}">
                        <p>
                            {{$card->bonus}}
                        </p>
                    </div>
                    <p class="card-title  {{$card_name_hide_class}}">{{$card->card_name}}</p>
                    <p class="card-points right {{$card_number_hide_class}}">{{$card->card_number}}</p>
                </div>
                <!--end card-top-->
                <div class="card-bottom">
                    <div class="row">
                        <div class="card-icon left {{$type_name_hide_class}}">
                            @if(!empty($card->type_name))
                            {{$card->type_name->name}}
                            @endif
                        </div>
                        <span class="card-points right {{$tier_name_hide_class}}">
                            @if(!empty($card->tier_name))
                            {{$card->tier_name->name}}
                            @endif
                        </span>
                    </div>
                    <p class="row {{$rewards_hide_class}}">
                        <b class="left">Rewards</b>
                        <span class="left">
                            {{$rewards = $card->rewards}}
                        </span>
                    </p>
                    <p class="{{$description_hide_class}}">
                        {{$card->description}}
                    </p>
                </div>
                <!--end card-bottom-->
            </div>
            <!--end card-content-->


            @if(!empty($card->cropped_image_file_name))
            <img src="{{ URL::asset('uploads/card/cropped') }}/{{$card->cropped_image_file_name}}">
            @else
            <img src="{{ URL::asset('uploads/card/originals') }}/{{$card->image}}">
            @endif

            @if($card->mask_image)
            <img src="{{ URL::asset('uploads/card/') }}/{{$card->mask_image}}">
            @endif
            
            <!-- Options -->
            <div class="hover_pop">
                <ul>
                    <li><a href="javascript:void()" onclick="zoomImage('<?php echo $card->image ?>')">Zoom</a></li>
                </ul>
            </div>
        </div>
    @endforeach
</div>
@else
    <div class="text-center">Cards not available</div>
@endif