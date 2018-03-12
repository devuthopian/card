@if(count($cardsObj)>0)
<?php $i=0; ?>
<div class="row card-parent">
    @foreach ($cardsObj as $key => $card)
        <?php $margin_class = ''; ?>
        @if($i==4)
        <?php $margin_class = 'second_row_first_column'; ?>
        @endif
        @if($i==7)
        <?php $margin_class = 'third_row_first_column'; ?>
        @endif
        @if($i==9)
        <?php $margin_class = 'fourth_row_first_column'; ?>
        @endif

        <div class="card bordered shadowed {{$margin_class}}" id="card_<?php echo $card->id ?>">
            <div class="card-content">
                <div class="card-top">
                    <div class="rosette left">
                        <p>
                            Bonus +50
                        </p>
                    </div>
                    <p class="card-title">{{$card->card_name}}</p>
                    <p class="card-points right" style="display: none">AP300</p>
                </div>
                <!--end card-top-->
                <div class="card-bottom">
                    <div class="row">
                        <div class="card-icon left">f</div>
                        <span class="card-points right">Tier1</span>
                    </div>
                    <p class="row">
                        <b class="left">Rewards</b>
                        <span class="left">Receive news 10 minutes early Receive news 10 minutes early Receive news 10 minutes earlysReceive news 10 minutes early</span>
                    </p>
                    <p>
                        @if(strlen($card->description)>100)
                        <?php $description = substr($card->description,0,100).'.....';  ?>
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

            <!-- Options -->
            <div class="hover_pop">
                <ul>
                    <li><a href="javascript:void()" onclick="zoomImage('<?php echo $card->image ?>')">Zoom</a></li>
                    <li><a href="javascript:void()" onclick="editCard('<?php echo $card->id ?>')">Edit</a></li>
                    @if(empty($card->is_released))
                    <li><a href="javascript:void()" id="released_option_<?php echo $card->id ?>" onclick="releaseCard('<?php echo $card->id ?>')">Release</a></li>
                    @endif
                    <li><a href="javascript:void()" onclick="duplicateCard('<?php echo $card->id ?>')">Duplicate</a></li>
                    <li><a href="javascript:void()" onclick="removeCard('<?php echo $card->id ?>')">Remove</a></li>
                </ul>
            </div>

        </div>
        <?php $i++; ?>
    @endforeach
</div>
@else
    <div class="text-center">Cards not available</div>
@endif