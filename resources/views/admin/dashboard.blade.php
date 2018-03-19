@extends('admin.layouts.main')

@section('content')
    <div class="admin_cont">
        <div class="tracking_cont">
        	<!-- Users -->
            <div class="col-sm-4 text-center" id="users_stats">
                <div class="admin_stats">
                	<i class="fas fa-user"></i>
                	<div class="clearfix"></div>
                	<strong>Users</strong> <span class="count_class">{{count($users)}}</span>
                </div>
            </div>

            <!-- Profiles -->
            <div class="col-sm-4 text-center" id="user_profiles_stats">
                <div class="admin_stats">
                	<i class="fas fa-user-circle"></i>
                	<div class="clearfix"></div>
                	<strong>User Profiles</strong> <span class="count_class">{{count($user_profiles)}}</span>
                </div>
            </div>

            <!-- Cards -->
            <div class="col-sm-4 text-center" id="cards_stats">
                <div class="admin_stats">
                	<i class="far fa-clone"></i>
                	<div class="clearfix"></div>
                	<strong>Cards</strong> <span class="count_class">{{count($user_profiles)}}</span>
                </div>
            </div>
        </div>
    </div>
@endsection