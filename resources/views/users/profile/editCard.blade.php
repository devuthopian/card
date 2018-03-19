@extends('users.layouts.profile')
@section('content')
<body onload="sizing()" onresize="sizing()">
    <div class="wrapper">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <!--end navbar-header-->
                @include('users.profile.partials.top_navbar')
                <!--end navbar-collapse-->
            </div>
            <!--end navbar-->
        </nav>
        <div class="content">
            <div class="container">
                <div class="card_editor_cont">
            <h2>Card Editor</h2>
            <div class="card_editor_left">
            <div class="fields_left">
                <span><input type="text" placeholder="Wiz2 D"> <i class="far fa-window-close"></i></span>
                <span><input type="text" placeholder="Bonus +50"> <i class="far fa-window-close"></i></span>
                <span><input type="text" placeholder="AP 300"> <i class="far fa-window-close"></i></span>
                <span><input type="text" placeholder="F"> <i class="far fa-window-close"></i></span>
                <span><input type="text" placeholder="Tier 1"> <i class="far fa-window-close"></i></span>
                <span><input type="text" placeholder="Wiz2 D"> <i class="far fa-window-close"></i></span>
                </div>
                <div class="fields_right">
                    <button class="editor_button">Choose Image</button>
                    <button class="editor_button">Choose Background</button>
                    <button class="editor_button">Choose Mask</button>
                </div>
                <span class="textarea"><textarea>Receive news 10 minutes early</textarea> <i class="far fa-window-close"></i></span>
                <span class="textarea"><textarea>Wiz2 D</textarea> <i class="far fa-window-close"></i></span>
                <span><button class="color_picker">Theme Color Picker</button></span>
            </div>
            <div class="card_editor_right">
                <div class="row card-parent">
                <div class="card bordered shadowed" style="height: 375px;">
                    <div class="card-content">
                        <div class="card-top">
                            <div class="rosette left">
                                <p>
                                    Bonus +50
                                </p>
                            </div>
                            <p class="card-title">fan forever</p>
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
                                <span class="left">Receive news 10 minutes early Receive news 10 minutes early Receive news 10 minutes earlys</span>
                            </p>
                            <p>The fans adore Jane’s words, and tilt their heads to catch every sentence.</p>
                        </div>
                        <!--end card-bottom-->
                    </div>
                    <!--end card-content-->
                    <img src="{{ URL::asset('images/card1.jpg') }}" style="height: 375px;">
                    <img src="{{ URL::asset('images/mask.png') }}" style="height: 375px;">
                </div>
            </div>
            </div>
        </div>

            </div>
        </div>
    </div>
</body>
@endsection