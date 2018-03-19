@extends('admin.layouts.main')

@section('content')
    <div class="admin_cont">
        <div class="tracking_cont">
        	<!-- Users -->
            <div class="col-sm-4 text-center" id="users_stats">
            	<i class="fas fa-user"></i>
            	<div class="clearfix"></div>
            	<strong>Users</strong> {{count($users)}}
            </div>

            <!-- Profiles -->
            <div class="col-sm-4 text-center" id="user_profiles_stats">
            	<i class="fas fa-user-circle"></i>
            	<div class="clearfix"></div>
            	<strong>User Profiles</strong> {{count($user_profiles)}}
            </div>

            <!-- Cards -->
            <div class="col-sm-4 text-center" id="cards_stats">
            	<i class="far fa-clone"></i>
            	<div class="clearfix"></div>
            	<strong>Cards</strong> {{count($user_profiles)}}
            </div>
        </div>
    </div>
@endsection