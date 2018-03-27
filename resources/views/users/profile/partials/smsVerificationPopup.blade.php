<div class="modal fade" id="otpVerificationModal" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>  
        <h4>OTP Verification</h4>        
      </div>
      <div class="modal-body">
        {{ Form::open(array('url' => 'user/addProfile', 'id' => 'addProfile', 'files' => true)) }}
          <div class="profile_cont">

            <!-- Mobile number -->
            <div class="row" id="sendOTPBlock">
              <div class="col-sm-12">
                {{ Form::label('mobile_number', 'Mobile number:') }}
                {{ Form::text('mobile_number', null, array('id' => 'mobile_number', 'required'=> true, 'placeholder'=>'Mobile number', 'required'=>true)) }}
              </div>
              <div class="col-sm-3">
                <button type="button" class="btn-submit btn-medium" onclick="sendOTP()" name="sendOtp" id="sendOtp" >Send OTP</button>
              </div>
              <hr>
            </div>
            <!-- OTP -->
            <div class="row hide" id="verifyOTPBlock">
              <div class="col-sm-12">
                {{ Form::label('verification_code', 'OTP:') }}
                {{ Form::text('verification_code', null, array('id' => 'verification_code', 'required'=> true, 'placeholder'=>'OTP', 'required'=>true)) }}
              </div>
              <div class="col-sm-3">
                <button type="button" class="btn-submit btn-medium" onclick="verifyOTP()" name="sendOtp" id="sendOtp" >Verify</button>
              </div>
              <div class="col-sm-3">
                <button type="button" class="btn-submit btn-medium" onclick="sendOTP()" name="sendOtp" id="sendOtp" >Resend</button>
              </div>
            </div>

          </div>
        {{ Form::close() }}
      </div>
    </div>
  </div>
</div>