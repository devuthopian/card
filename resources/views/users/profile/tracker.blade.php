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
                <h2>Tracker</h2>
                    <table>
                        <tr>
                            <th>Name</th>
                            <th>Cards</th>
                            <th>Others</th>
                        </tr>
                        @if(!empty($userDetailsObj->reference_user_profile))
                            <?php $referenceUserProfile = $userDetailsObj->reference_user_profile; ?>
                            <tr>
                                <td>{{$referenceUserProfile->name}}</td>
                                <td>Lorem</td>
                                <td>Lorem</td>
                            </tr>
                        @else
                            <tr>
                                <td colspan="3" class="text-center"> No Trackers Available</td>
                            </tr>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection