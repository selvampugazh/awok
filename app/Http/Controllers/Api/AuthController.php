<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Resources\User\UserResource;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Validator;

class AuthController extends Controller
{
    public function register(Request $request){

    	$validator = Validator::make($request->all(),[
    		'mobile' => 'required|digits:10|unique:users,mobile',
    		'password' => 'required',
    	]);

    	if($validator->fails()){
    		$errors = collect($validator->messages())->flatten()->toArray();
    		return response()->json(['status' => false, 'message' => 'Validation Errors', 'data' => $errors]);
    	}

        try{
            // Register New User
            $user = new User();
            $user->user_elixir_id = Str::random(8);
            $user->mobile = $request->mobile;
            $user->is_verified = 0;
            $user->password = bcrypt($request->password);
            $status = $user->save();

            $otp = $this->send_otp_sms($request->mobile);

            $data = new UserResource($user);
        }
        catch(\Exception $e){
            return response()->json(['status' => false, 'message' => 'Something Went Wrong']);
        }

        return response()->json(['status' => true, 'message' => 'User Registered', 'otp' => $otp, 'data' => $data]);	
    }

    public function send_otp(Request $request){

        $validator = Validator::make($request->all(),[
            'mobile' => 'required|exists:users,mobile',
        ]);

        if($validator->fails()){
            $errors = collect($validator->messages())->flatten()->toArray();
            return response()->json(['status' => false, 'message' => 'Validation Errors', 'data' => $errors]);
        }

        $otp = $this->send_otp_sms($request->mobile);

        return response()->json(['status' => true, 'message' => 'Otp Sent', 'otp' => $otp]);    
    }

    public function verify_user(Request $request){
        $validator = Validator::make($request->all(),[
            'mobile' => 'required|exists:users,mobile',
        ]);

        if($validator->fails()){
            $errors = collect($validator->messages())->flatten()->toArray();
            return response()->json(['status' => false, 'message' => 'Validation Errors', 'data' => $errors]);
        }

        try{
            $user = User::findByMobile($request->mobile)->first();
            $user->is_verified = 1;
            $user->save();
        }
        catch(\Exception $e){
            return response()->json(['status' => false, 'message' => 'Something Went Wrong']);   
        }

        $data = new UserResource($user);
        return response()->json(['status' => true, 'message' => 'User Verified', 'data' => $data]);
    }

    public function reset_password(Request $request){
        $validator = Validator::make($request->all(),[
            'mobile' => 'required|exists:users,mobile',
            'password' => 'required',
            'provider' => [
                'required',
                Rule::in(['users'])
            ]
        ]);

        if($validator->fails()){
            $errors = collect($validator->messages())->flatten()->toArray();
            return response()->json(['status' => false, 'message' => 'Validation Errors', 'data' => $errors]);
        }

        try {
            if($request->provider === 'users'){
                $data = $this->user_password_reset($request->mobile, $request->password);
            }
        } 
        catch (Exception $e) {
            return response()->json(['status' => false, 'message' => 'Something Went Wrong']);  
        }
        return response()->json(['status' => true, 'message' => 'Password Changed', 'data' => $data]);
    }


    public function user_password_reset($mobile, $password){
        $user = User::findByMobile($mobile)
                    ->first();
        $user->password = bcrypt($password);
        $user->save();

        return $user;
    }


    public function send_otp_sms($mobile){
        //Generate Otp 
        $otp = rand(1000, 9999);

        // Send Sms with Password 
        $data['mobile'] = $mobile;
        $data['msgtxt'] = "<#> Your verification code is ".$otp;
        //Helper::sendSMS($data);

        return $otp;
    }
}
