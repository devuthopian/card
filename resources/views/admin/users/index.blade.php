@extends('admin.layouts.main')

@section('content')
    <div class="admin_cont">
        <div class="tracking_cont">
            <h2>Users</h2>
            <table>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Provider</th>
                    <th>Actions</th>
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
                                <a href="javascript:void(0)" onclick="approveUser({{$user->id}})">
                                    Approve
                                </a>
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