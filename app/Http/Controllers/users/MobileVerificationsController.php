<?php

namespace App\Http\Controllers\users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\MobileVerification;

use Auth;

class MobileVerificationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * send Otp
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sendOTP(Request $request){
        $logged_user_id = Auth::id();
        $mobile_number = $request->mobile_number;
        $code = rand(100000, 999999);

        $mobileNumberDetailsObj = MobileVerification::where([
                ['mobile_number', $mobile_number],
                ['verified', 1]
        ])->first();

        if(empty($mobileNumberDetailsObj) ){
            MobileVerification::where('mobile_number', $mobile_number)->delete();

            $dataArr['mobile_number'] = $mobile_number;
            $dataArr['verification_code'] = $code;
            $dataArr['verified'] = 0;
            $dataArr['user_id'] = $logged_user_id;

            MobileVerification::create($dataArr);

            ### response
            return response()->json(array(
                    'code' => 1, 
                    'message' => 'OTP has been sent successfully.',
                    'data' => array()
                    )
                );
        }else{
            ### response
            return response()->json(array(
                    'code' => 0, 
                    'message' => 'Mobile number already verified for another user.',
                    'data' => array()
                    )
                );
        }
    }



    public function verifyOTP(Request $request){
        $logged_user_id = Auth::id();
        $mobile_number = $request->mobile_number;
        $verification_code = $request->verification_code;

        $mobileNumberDetailsObj = MobileVerification::where([
                ['user_id', $logged_user_id],
                ['mobile_number', $mobile_number],
                ['verification_code', $verification_code],
                ['verified', 0]
        ])->first();
        
        if(!empty($mobileNumberDetailsObj) ){
            $mobileNumberDetailsObj->update(['verified'=>1]);

            ### response
            return response()->json(array(
                    'code' => 1, 
                    'message' => 'Mobile number has been verified successfully.',
                    'data' => array()
                    )
                );
        }else{
            ### response
            return response()->json(array(
                    'code' => 0, 
                    'message' => 'Wrong verification code.',
                    'data' => array()
                    )
                );
        }
    }


}
