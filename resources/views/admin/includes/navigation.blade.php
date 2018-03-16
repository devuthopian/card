<nav class="navbar navbar-default navbar-default-admin">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mynav">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="#">
                <img src="{{ URL::asset('images/misbits-logo.png') }}"  alt="">
            </a>
        </div>
        <!--end navbar-header-->
        <div class="collapse navbar-collapse pull-right" id="mynav">
            <ul class="nav navbar-nav">
                <li>
                    <a href="javascript:void(0)" onclick="logoutConfirm()">
                        Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    <!--end navbar-->
</nav>