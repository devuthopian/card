{{ Form::open(array('url' => 'user/profile/settings', 'id' => 'verifyProfile')) }}
    <div class="tracking_cont_right ">
        @if (session('profile_status'))
            <div class="alert alert-success">
                {{ session('profile_status') }}
            </div>
        @endif
        <h2>Profile Verification (Optional)</h2>
        <h5>If you visit to offer </h5>  

        <!-- Current Password -->
        {{ Form::label('provider_id', 'Select Verification method :') }}
        <?php $serviceProviderArr = array(0=>' -- Select Provider -- ', 1 => 'Facebook', 2 => 'Twitter', 3 => 'Google'); ?>
        {{ Form::select('provider_id', $serviceProviderArr, Auth::user()->provider_id, array('id' => 'provider_id', 'required'=> true)) }}
        
        {{ Form::label('profile_link', 'Link to < twitter / facebook / google > :') }}
        {{ Form::text('profile_link', Auth::user()->profile_link, array('id' => 'profile_link', 'required'=> true, 'placeholder'=>'Profile Link')) }}
        
        {{ Form::submit('Save', array('name'=>'profileVerification', 'id'=>'profileVerification')) }}

    </div>
{{ Form::close() }}