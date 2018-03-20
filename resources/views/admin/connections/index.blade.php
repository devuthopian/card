@extends('admin.layouts.main')

@section('content')
    <div class="admin_cont">
        <div class="tracking_cont">

        	@if (session('success'))
	            <div class="alert alert-success">
	                {{ session('success') }}
	            </div>
	        @endif 

            {{ Form::open(array('route' => 'admin.connections.update', 'id' => 'editFacebookSettings', 'files' => true)) }}
            @csrf

            <!-- Facebook Settings -->
                <h4>Facebook Settings</h4>
                <label class="col-sm-12">Client ID</label>
                <div class="col-sm-12 clearfix">
                    {{ Form::text('connectionSetting[1]', $connectionSettingsResultObj[0]->setting_value, array('id' => 'facebook_client_id', 'required'=> true, 'placeholder'=>'Client ID', 'required'=>'required')) }}
                </div>
                <label class="col-sm-12">Client Secret</label>
                <div class="col-sm-12 clearfix">
                    {{ Form::text('connectionSetting[2]', $connectionSettingsResultObj[1]->setting_value, array('id' => 'facebook_client_secret', 'required'=> true, 'placeholder'=>'Client Secret', 'required'=>'required')) }}
                </div>
                <label class="col-sm-12">Redirect Url</label>
                <div class="col-sm-12 clearfix">
                    {{ Form::text('connectionSetting[3]', $connectionSettingsResultObj[2]->setting_value, array('id' => 'facebook_redirect_url', 'required'=> true, 'placeholder'=>'Redirect Url', 'required'=>'required')) }}
                </div>

            <!-- Twitter Settings -->

            <h4>Twitter Settings</h4>
            <label class="col-sm-12">Client ID</label>
            <div class="col-sm-12 clearfix">
                {{ Form::text('connectionSetting[4]', $connectionSettingsResultObj[3]->setting_value, array('id' => 'twitter_client_id', 'required'=> true, 'placeholder'=>'Client ID', 'required'=>'required')) }}
            </div>
            <label class="col-sm-12">Client Secret</label>
            <div class="col-sm-12 clearfix">
                {{ Form::text('connectionSetting[5]', $connectionSettingsResultObj[4]->setting_value, array('id' => 'twitter_client_secret', 'required'=> true, 'placeholder'=>'Client Secret', 'required'=>'required')) }}
            </div>
            <label class="col-sm-12">Redirect Url</label>
            <div class="col-sm-12 clearfix">
                {{ Form::text('connectionSetting[6]', $connectionSettingsResultObj[5]->setting_value, array('id' => 'twitter_redirect_url', 'required'=> true, 'placeholder'=>'Redirect Url', 'required'=>'required')) }}
            </div>


            <!-- Twitter Settings -->

            <h4>Google & Youtube Settings</h4>
            <label class="col-sm-12">Client ID</label>
            <div class="col-sm-12 clearfix">
                {{ Form::text('connectionSetting[7]', $connectionSettingsResultObj[6]->setting_value, array('id' => 'google_client_id', 'required'=> true, 'placeholder'=>'Client ID', 'required'=>'required')) }}
            </div>
            <label class="col-sm-12">Client Secret</label>
            <div class="col-sm-12 clearfix">
                {{ Form::text('connectionSetting[8]', $connectionSettingsResultObj[7]->setting_value, array('id' => 'google_client_secret', 'required'=> true, 'placeholder'=>'Client Secret', 'required'=>'required')) }}
            </div>
            <label class="col-sm-12">Redirect Url</label>
            <div class="col-sm-12 clearfix">
                {{ Form::text('connectionSetting[9]', $connectionSettingsResultObj[8]->setting_value, array('id' => 'google_redirect_url', 'required'=> true, 'placeholder'=>'Redirect Url', 'required'=>'required')) }}
            </div>

            <div class="col-sm-12 clearfix">
                <input type="submit" value="Save">
            </div>
            {{ Form::close() }}

        </div>
    </div>

@endsection
@section('page_scripts')
<script src="{{ asset('js/admin/notes/index.js') }}"></script>
@endsection