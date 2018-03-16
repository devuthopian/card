@extends('admin.layouts.main')

@section('content')
    <div class="admin_cont">
        <div class="tracking_cont">
            <h2>Users</h2>
            <table>
                <tr>
                    <th class="col-sm-2">Name</th>
                    <th class="col-sm-2">Email</th>
                    <th class="col-sm-2">Provider</th>
                    <th class="col-sm-1">Profile Provider</th>
                    <th class="col-sm-3">Profile link</th>
                    <th class="col-sm-2">Actions</th>
                </tr>
                @if(!empty($users))
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                <?php $account = $user->accounts; ?>
                                @if(!empty($account))
                                    {{ucwords($account->provider_name)}}
                                @else
                                    Website
                                @endif
                            </td>
                            <td>
                                <?php $provider_id = $user->provider_id; ?>

                                @if(!empty($provider_id))
                                    @if($provider_id==1)
                                        Facebook
                                    @elseif($provider_id==2)
                                        Twitter
                                    @else
                                        Google
                                    @endif
                                @else
                                    N/A
                                @endif
                                
                            </td>
                            <td>
                                <?php $profile_link = $user->profile_link; ?>

                                @if(!empty($profile_link))
                                    <a target="_blank" href="{{$profile_link}}" style="text-transform: none !important;">{{$profile_link}}</a>
                                @else
                                    N/A
                                @endif
                                
                            </td>
                            <td>
                                <?php $is_profile_approved = $user->is_profile_approved; ?>

                                @if(!empty($provider_id) && empty($is_profile_approved))
                                <a class="btn btn-warning" href="javascript:void(0)" onclick="approveUser({{$user->id}})">
                                    Approve
                                </a>
                                @endif

                                @if(!empty($is_profile_approved))
                                    <div class="alert alert-success text-center">Approved</div>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="3" class="text-center"> No Users Available</td>
                    </tr>
                @endif
            </table>
        </div>
        <div class="row">
            <div class="col-sm-12 text-right">
                {!! $users->render() !!}
            </div>
        </div>
    </div>
@endsection
@section('page_scripts')
<script src="{{ asset('js/admin/users/index.js') }}"></script>
@endsection