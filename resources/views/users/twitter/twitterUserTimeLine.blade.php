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
                
                <h2>Laravel 5 - Twitter API</h2>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="50px">No</th>
                            <th>Twitter Id</th>
                            <th>Message</th>
                            <th>Images</th>
                            <th>Favorite</th>
                            <th>Retweet</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($data))
                            @foreach($data as $key => $value)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $value['id'] }}</td>
                                    <td>{{ $value['text'] }}</td>
                                    <td>
                                        @if(!empty($value['extended_entities']['media']))
                                            @foreach($value['extended_entities']['media'] as $v)
                                                <img src="{{ $v['media_url_https'] }}" style="width:100px;">
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>{{ $value['favorite_count'] }}</td>
                                    <td>{{ $value['retweet_count'] }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6">There are no data.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>

                <!-- HTML - END -->
            </div>
        </div>
    </div>
</body>
@endsection
@section('scripts')
<script src="{{ asset('js/users/profile/tracking.js') }}"></script>
@endsection