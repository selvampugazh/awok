<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserQuestionResource;
use App\Http\Resources\User\UserResource;
use App\Model\UserDetails;
use App\Model\UserQuestion;
use App\User;
use Auth;
use DB;
use Illuminate\Http\Request;
use Storage;
use Toastr;
use Validator;

class UserController extends Controller
{
    public function basic_details(Request $request){
    	$validator = Validator::make($request->all(),[
    		'name' => 'required|max:191',
    		'email' => 'required|email|max:191|unique:users,email,'.Auth::id(),
    		'dob' => 'required|date|before_or_equal:today',
    		'gender' => 'required|numeric|min:1|max:3',
    	]);

    	if($validator->fails()){
    		$errors = collect($validator->messages())->flatten()->toArray();
    		return response()->json(['status' => false, 'message' => 'Validation Errors', 'data' => $errors]);
    	}

    	// Database Operation
    	try {
    		DB::beginTransaction();

    		$user = Auth::user();
    		$user->name = $request->name;
    		$user->email = $request->email;
    		$user->save();

    		UserDetails::updateOrCreate([
    			'user_id' => Auth::id()
    		],[
    			'dob' => date('Y-m-d', strtotime($request->dob)),
    			'gender' => $request->gender,
    		]);

    		DB::commit();
    	} 
    	catch (Exception $e) {
    		DB::rollback();
            return response()->json(['status' => false, 'message' => 'Something Went Wrong']);
    	}

    	// User Resouce collection Instance.
    	$user = new UserResource($user);
    	return response()->json(['status' => true, 'message' => 'User basic details updated', 'data' => $user]);
    }

    public function profile_upload(Request $request){
    	$validator = Validator::make($request->all(),[
    		'profile' => 'required|image',
    	]);

    	if($validator->fails()){
    		$errors = collect($validator->messages())->flatten()->toArray();
    		return response()->json(['status' => false, 'message' => 'Validation Errors', 'data' => $errors]);
    	}

    	try {
            $file = $request->file('profile');
            $path = Storage::put('uploads/profile', $file);

            UserDetails::updateOrCreate([
    			'user_id' => Auth::id()
    		],[
    			'profile' => $path
    		]);

    	} 
    	catch (Exception $e) {
            return response()->json(['status' => false, 'message' => 'Something Went Wrong']);   		
    	}

    	// User Resouce collection Instance.
    	$user = new UserResource(Auth::user());
    	return response()->json(['status' => true, 'message' => 'User Created', 'data' => $user]);
    }

    public function get_basic_details(){
        $data = new UserResource(Auth::user());
        return response()->json(['status' => true, 'message' => 'User details', 'data' => $data]);
    }

}
