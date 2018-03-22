<br><br>
@if(count($cards)>0)
<div class="row card-parent">
    @foreach ($cards as $key => $card)
        <div class="card bordered shadowed" id="card_<?php echo $card->id ?>">
            <div class="card-content">
                <div class="card-top">
                    <div class="rosette left">
                        <p>
                            {{$card->bonus}}
                        </p>
                    </div>
                    <p class="card-title">{{$card->card_name}}</p>
                    <p class="card-points right">{{$card->card_number}}</p>
                </div>
                <!--end card-top-->
                <div class="card-bottom">
                    <div class="row">
                        <div class="card-icon left">
                            @if(!empty($card->type_name))
                            {{$card->type_name->name}}
                            @endif
                        </div>
                        <span class="card-points right">
                            @if(!empty($card->tier_name))
                            {{$card->tier_name->name}}
                            @endif
                        </span>
                    </div>
                    <p class="row">
                        <b class="left">Rewards</b>
                        <span class="left">
                            @if(strlen($card->rewards)>50)
                            <?php $rewards = substr($card->rewards,0,50);  ?>
                            @else
                            <?php $rewards = $card->rewards; ?>
                            @endif
                            {{$rewards}}
                        </span>
                    </p>
                    <p>
                        @if(strlen($card->description)>100)
                        <?php $description = substr($card->description,0,100);  ?>
                        @else
                        <?php $description = $card->description; ?>
                        @endif
                        {{$description}}
                    </p>
                </div>
                <!--end card-bottom-->
            </div>
            <!--end card-content-->
            <img src="{{ URL::asset('uploads/card/') }}/{{$card->image}}">

            <img src="{{ URL::asset('uploads/card/') }}/{{$card->mask_image}}">

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