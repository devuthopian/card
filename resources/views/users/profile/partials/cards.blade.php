@if(count($cardsObj)>0)
<?php $i=0; ?>
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
        <div class="col-sm-6 col-md-3 block-container <?php echo $margin_class; ?>" id="card_<?php echo $card->id ?>">
            <div class="pop_up">
                <h2><span>Bonus + 50</span> <strong>{{$card->card_name}}</strong></h2>
                <img src="{{ URL::asset('uploads/card/') }}/{{$card->image}}" alt="" style="height: 400px !important;">
                <div class="content_caption">
                    <h3><span>F</span> Tier 1</h3>
                    <div class="card_description">
                        <h4><strong>Rewards</strong> <span>The holder reviews news 10 minuts later</span></h4>
                        <p>{{$card->description}}</p>
                    </div>
                </div>
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
        </div>
        <?php $i++; ?>
    @endforeach

@else
    <div class="text-center">Cards not available</div>
@endif