<?php $cardsObj = $profile->cards; ?>
@if(count($cardsObj)>0)
<?php $i=0; ?>
    @foreach ($cardsObj as $key => $card)
        <div class="col-sm-6 col-md-4 block-container" id="card_<?php echo $card->id ?>">
            <div class="pop_up">
                <h2><span>Bonus + 50</span> <strong>{{$card->card_name}}</strong></h2>
                <img src="{{ URL::asset('uploads/card/') }}/{{$card->image}}" alt="" style="min-height: 400px;">
                <div class="content_caption">
                    <h3><span>F</span> Tier 1</h3>
                    <div class="card_description">
                        <h4>Rewards <span>The holder reviews news 10 minuts later</span></h4>
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
        @if($i%3==0)
        <!-- <div class="clearfix"></div> -->
        @endif
    @endforeach
@else
    <div class="text-center">Cards not available</div>
@endif