<nav id="sidebar">
    <button type="button" id="sidebarCollapse" class="toggle">
      <i class="fas fa-align-left"></i>
    </button>
    
    <ul class="list-unstyled components">
        <li class="" id="my_account_tab">
            <a href="{{route('admin.dashboard')}}">Dashboard</a>
        </li>
        <li class="" id="login_tab">
            <a href="{{route('admin.user.manage')}}" >Users</a>
        </li>
    </ul>
</nav>