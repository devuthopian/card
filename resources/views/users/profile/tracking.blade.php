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
                <div class="tracking_cont">
                <h2>Tracking Profile</h2>
                    <table>
                        <tr>
                            <th>Name</th>
                            <th>Invited Profile</th>
                            <th>Invited Profile Link</th>
                            <th>Cards owned</th>
                            <th>Confidente</th>
                            <th>Fan</th>
                            <th>Backer</th>
                        </tr>
                        @foreach($userResultObj->user_profiles as $userProfileObj)
                            @foreach($userProfileObj->invitations as $invitationObj)
                                    @foreach($invitationObj->users as $userObj)
                                        <tr>
                                            <td>{{$userObj->name}}</td>
                                            <td>{{$userProfileObj->name}}</td>
                                            <td><?php echo url('share').'?id='.$invitationObj->profile_id.'_'.$invitationObj->unique_id; ?></td>
                                            <td>Lorem</td>
                                            <td>Lorem</td>
                                            <td>Lorem</td>
                                            <td>Lorem</td>
                                        </tr>
                                    @endforeach
                            @endforeach
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection