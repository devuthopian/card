@extends('users.layouts.profile')
@section('content')
<body onload="sizing()" onresize="sizing()">
    <div class="wrapper">

    @if (Auth::check())
    <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <!--end navbar-header-->
                @include('users.profile.partials.top_navbar')
                <!--end navbar-collapse-->
            </div>
            <!--end navbar-->
        </nav>
@else
  
@endif
 <div class="content">
            <div class="container">
            @if(empty($status))
                <div class="alert alert-danger">
                <strong>No card Available</strong>
                </div>
              @else
                <div class="card_editor_cont">
                 <?php $margin_class = ''; ?>
              <div class="view_card card bordered shadowed {{$margin_class}}" id="card_<?php echo $card->id ?>">
            <div class="card-content">
                <div class="card-top">

                    <!-- bonus hide/show  -->
                    <?php $bonus_hide_class = 'hide'; ?>
                    @if(!empty($card->is_bonus) && (!empty($card->bonus)))
                    <?php $bonus_hide_class = ''; ?>
                    @endif

                    <!-- card name hide/show  -->
                    <?php $card_name_hide_class = 'hide'; ?>
                    @if(!empty($card->is_card_name) && !empty($card->card_name))
                    <?php $card_name_hide_class = ''; ?>
                    @endif

                    <!-- card number hide/show  -->
                    <?php $card_value_hide_class = 'hide'; ?>
                    @if(!empty($card->is_card_value) && !empty($card->card_value))
                    <?php $card_value_hide_class = ''; ?>
                    @endif

                    <!-- type name hide/show  -->
                    <?php $type_name_hide_class = 'hide'; ?>
                    @if(!empty($card->is_type_name) && !empty($card->type_name))
                    <?php $type_name_hide_class = ''; ?>
                    @endif

                    <!-- tier name hide/show  -->
                    <?php $tier_name_hide_class = 'hide'; ?>
                    @if(!empty($card->is_tier_name) && !empty($card->tier_name))
                    <?php $tier_name_hide_class = ''; ?>
                    @endif

                    <!-- rewards hide/show  -->
                    <?php $rewards_hide_class = 'hide'; ?>
                    @if(!empty($card->is_rewards) && !empty($card->rewards))
                    <?php $rewards_hide_class = ''; ?>
                    @endif

                    <!-- description hide/show  -->
                    <?php $description_hide_class = 'hide'; ?>
                    @if(!empty($card->is_description) && !empty($card->description))
                    <?php $description_hide_class = ''; ?>
                    @endif

                    <div class="rosette left {{$bonus_hide_class}}">
                        <p>
                            {{$card->bonus}}
                        </p>
                    </div>
                    <p class="card-title {{$card_name_hide_class}}">{{$card->card_name}}</p>
                    <p class="card-points right {{$card_value_hide_class}}">{{$card->card_value}}</p>
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
                            {{$card->rewards}}
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
            @elseif(!empty($card->image))
                <img src="{{ URL::asset('uploads/card/originals') }}/{{$card->image}}">
            @endif

            @if($card->mask_image)
            <img src="{{ URL::asset('uploads/card/') }}/{{$card->mask_image}}">
            @endif
        </div>
        </div>
        @endif
            </div>
        </div>
    </div>
</body>
@endsection