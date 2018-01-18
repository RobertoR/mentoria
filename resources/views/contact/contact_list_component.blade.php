@extends('layouts.app')
@section('content')	
	<div class="container">
		<div ng-app="myApp">
			<a ui-sref="list" ui-sref-active="active">List</a>    
			<ui-view></ui-view>
		</div>	
	</div>	
@endsection