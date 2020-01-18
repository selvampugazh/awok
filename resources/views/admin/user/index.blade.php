@extends('admin._master')

@section('title', 'User')

@section('content')

@include('admin.component.table', [
	'title' => 'Users',
	'data' => $users,
	'show_route' => 'admin.user.show',
	'head' => [
		'user_elixir_id' => 'User ID',
		'name' => 'Name',
		'mobile' => 'Mobile',
		'email' => 'Email',
		'dob' => 'DOB',
		'gender' => 'Gender'
	],
])

@endsection

@section('script')
@parent

<script type="text/javascript">
	$(document).ready(function(){
		$('#users-table').dataTable();
	});
</script>

@endsection

