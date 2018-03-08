@if(count($cards)>0)
<?php $i=0; ?>
    @foreach ($cards as $key => $card)
        <div class="col-sm-6 col-md-4 block-container" id="card_<?php echo $card->id ?>">
            <div class="pop_up">
                <h2><span>Bonus + 50</span> {{$card->card_name}}</h2>
                <img src="{{ URL::asset('uploads/card/') }}/{{$card->image}}" alt="" style="height: 400px;">
                <div class="content_caption">
                    <h3><span>F</span> Tier 1</h3>
                    <h4>Rewards <span>The holder reviews news 10 minuts later</span></h4>
                    <p>{{$card->description}}</p>
                </div>
                <div class="hover_pop">
                    <ul>
                        <li><a href="javascript:void()" onclick="zoomImage('<?php echo $card->image ?>')">Zoom</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <?php $i++; ?>
        @if($i%3==0)
        <div class="clearfix"></div>
        @endif
    @endforeach
@else
    <div class="text-center">Cards not available</div>
@endif