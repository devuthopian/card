<div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mynav">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
</div>

<div class="collapse navbar-collapse" id="mynav">
    <ul class="nav navbar-nav">
        <li>
            <a href="<?php echo url('user/index') ?>">Home</a>
        </li>
        <li>
            <a href="<?php echo url('user/dashboard') ?>">dashboard</a>
        </li>
        <li>
            <a href="<?php echo url('user/profile/tracking') ?>">tracking</a>
        </li>
        <li>
            <a href="<?php echo url('user/profile/tracker') ?>">trackers</a>
        </li>
        <li>
            <a href="#">FAQ</a>
        </li>
    </ul>
    <!--end navbar-nav-->
    <ul class="nav navbar-nav navbar-right">
        <li>
            <a href="#" class="fas fa-search"></a>
        </li>
        <li>
            <span data-toggle="dropdown" class="logo">
                <img src="{{ URL::asset('images/misbits-logo.png') }}"  alt="">
            </span>
            <ul class="dropdown-menu">
                <li>
                    <a href="<?php echo url('user/profile/myProfiles') ?>">
                        <i class="fas fa-user-circle"></i> &nbsp;my profiles
                    </a>
                </li>
                <li>
                    <a href="<?php echo url('user/profile/settings') ?>">
                        <i class="fas fa-cog"></i> &nbsp;Settings
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)" onclick="logoutConfirm()">
                        <i class="fas fa-sign-out-alt"></i> &nbsp; Logout &nbsp;&nbsp; 
                        <span><?php echo Auth::user()->name ?></span>
                    </a>
                </li>
           </ul>
        </li>
        <li>&nbsp;</li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </ul>
    <!--end navbar-nav-->
</div>