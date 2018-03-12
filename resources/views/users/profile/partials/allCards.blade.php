<br><br>
@if(count($cards)>0)
<div class="row card-parent">
    @foreach ($cards as $key => $card)
        <div class="card bordered shadowed" id="card_<?php echo $card->id ?>">
            <div class="card-content">
                <div class="card-top">
                    <div class="rosette left">
                        <p>
                            Bonus +50
                        </p>
                    </div>
                    <p class="card-title">{{$card->card_name}}</p>
                    <p class="card-points right">AP300</p>
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
            <img src="{{ URL::asset('public/uploads/card/') }}/{{$card->image}}">

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