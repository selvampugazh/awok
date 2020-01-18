@extends('admin._master')

@section('title', 'User')

@section('content')

@include('admin.component.view',[

	'class' => 'col-md-4',
	'route' => 'admin.user',
	'profile' => $user[0]->user_details->profile,
	'data' => $user,
	'head' => [
		'user_elixir_id' => 'Elixir Id', 
		'name' => 'Name',
		'email' => 'Email',
		'mobile' => 'Mobile',
		'is_verified' => 'Verified',
		'dob' => 'Date Of Birth',
		'gender' => 'Gender'
	]
])

@endsection

