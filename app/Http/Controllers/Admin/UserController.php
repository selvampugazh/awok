<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
    	$users = User::all();

    	$users = $users->map(function($user){
    		$user->dob = $user->user_details->dob;
    		$user->gender = ($user->user_details->gender == 1) ? 'Male' : (($user->user_details->gender == 2) ? 'Female' : (($user->user_details->gender == 3) ? 'Other' : null));
    		return $user;
    	});
    	return view('admin.user.index', compact('users'));
    }

    public function show($id){
    	$user = User::whereId($id)->get();

    	$user = $user->map(function($user){
    		$user->dob = $user->user_details->dob;
    		$user->is_verified = ($user->is_verified == 1) ? 'Verified' : 'Not Verified';
    		$user->gender = ($user->user_details->gender == 1) ? 'Male' : (($user->user_details->gender == 2) ? 'Female' : (($user->user_details->gender == 3) ? 'Other' : null));
    		return $user;
    	});

    	return view('admin.user.show', compact('user'));
    }
}
