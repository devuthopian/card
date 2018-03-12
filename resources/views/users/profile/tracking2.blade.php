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
                <!-- HTML -->
                    <div class="tracking_cont">
                <div class="tracker_head">
                   <img src="{{ URL::asset('public/images/profile_img1.png') }}" alt="">
                   <h1>Mr Mage is Tracking</h1>
                   <h2>28 <span>Tracking</span></h2>
                </div>
                <div class="tracker_head_sec">
                   <div class="head_sec_cont">
                   <span class="dropdown_icon" data-toggle="collapse" data-target="#demo1"><i class="fas fa-angle-down"></i></span>
                    <div class="head_sec_img">
                        <img src="{{ URL::asset('public/images/profile_img2.png') }}" alt="">
                    </div>
                    <div class="head_sec_name">
                        <h2>Jane Austen</h2>
                        <h3>Released 10 Cards</h3>                        
                    </div>
                    <div class="head_sec_detail">
                        <p><span>Activity Today 16:21</span></p>
                        <p>Latest chirp goes here (ie a fine day it was)</p>
                    </div>
                   </div>
                </div>
                <div class="cards_cont">
                    <div id="demo1" class="collapse">
                        <div class="n_cards">
                            <span class="n_cards_title">Fan Forever</span>
                            <img src="{{ URL::asset('public/images/header-img.jpg') }}" alt="">
                            <span class="n_cards_img" ><img src="{{ URL::asset('public/images/acquired.png') }}" alt=""></span>
                        </div>
                        <div class="n_cards">
                            <span class="n_cards_title">Fan Forever</span>
                            <img src="{{ URL::asset('public/images/header-img.jpg') }}" alt="">
                            <span class="n_cards_img" ><img src="{{ URL::asset('public/images/acquired.png') }}" alt=""></span>
                        </div>
                        <div class="n_cards">
                            <span class="n_cards_title">Fan Forever</span>
                            <img src="{{ URL::asset('public/images/header-img.jpg') }}" alt="">
                            <span class="n_cards_img" ><img src="{{ URL::asset('public/images/acquired.png') }}" alt=""></span>
                        </div>
                    </div>
                </div>
                   <div class="head_sec_cont">
                   <span class="dropdown_icon" data-toggle="collapse" data-target="#demo2"><i class="fas fa-angle-down"></i></span>
                    <div class="head_sec_img">
                        <img src="{{ URL::asset('public/images/profile_img2.png') }}" alt="">
                    </div>
                    <div class="head_sec_name">
                        <h2>Jane Austen</h2>
                        <h3>Released 10 Cards</h3>                        
                    </div>
                    <div class="head_sec_detail">
                        <p><span>Activity Today 16:21</span></p>
                        <p>Latest chirp goes here (ie a fine day it was)</p>
                    </div>
                   </div>
                <div class="cards_cont">
                    <div id="demo2" class="collapse">
                        <div class="n_cards">
                            <span class="n_cards_title">Fan Forever</span>
                            <img src="{{ URL::asset('public/images/header-img.jpg') }}" alt="">
                            <span class="n_cards_img" ><img src="public/images/acquired.png" alt=""></span>
                        </div>
                        <div class="n_cards">
                            <span class="n_cards_title">Fan Forever</span>
                            <img src="{{ URL::asset('public/images/header-img.jpg') }}" alt="">
                            <span class="n_cards_img" ><img src="public/images/acquired.png" alt=""></span>
                        </div>
                    </div>
                </div>
                   <div class="head_sec_cont">
                   <span class="dropdown_icon" data-toggle="collapse" data-target="#demo3"><i class="fas fa-angle-down"></i></span>
                    <div class="head_sec_img">
                        <img src="{{ URL::asset('public/images/profile_img2.png') }}" alt="">
                    </div>
                    <div class="head_sec_name">
                        <h2>Jane Austen</h2>
                        <h3>Released 10 Cards</h3>                        
                    </div>
                    <div class="head_sec_detail">
                        <p><span>Activity Today 16:21</span></p>
                        <p>Latest chirp goes here (ie a fine day it was)</p>
                    </div>
                   </div>
                   <div class="cards_cont">
                    <div id="demo3" class="collapse">
                      No Cards
                    </div>
                   </div>
                   <div class="head_sec_cont">
                   <span class="dropdown_icon" data-toggle="collapse" data-target="#demo4"><i class="fas fa-angle-down"></i></span>
                    <div class="head_sec_img">
                        <img src="{{ URL::asset('public/images/profile_img2.png') }}" alt="">
                    </div>
                    <div class="head_sec_name">
                        <h2>Jane Austen</h2>
                        <h3>Released 10 Cards</h3>                        
                    </div>
                    <div class="head_sec_detail">
                        <p><span>Activity Today 16:21</span></p>
                        <p>Latest chirp goes here (ie a fine day it was)</p>
                    </div>
                   </div>
                   <div class="cards_cont">
                    <div id="demo4" class="collapse">
                      No Cards
                    </div>
                   </div>
            </div>
                <!-- HTML - END -->
            </div>
        </div>
    </div>
</body>
@endsection