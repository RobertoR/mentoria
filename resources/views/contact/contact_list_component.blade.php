@extends('layouts.app')
@section('content')
	<div ng-app="myApp">
		<a ui-sref="list" ui-sref-active="active">List</a>    
		<ui-view></ui-view>
	</div>	
@endsection