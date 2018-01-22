@extends('layouts.app')
@section('content')	
	<div class="container">
		<div ng-app="myApp">
			<a ui-sref="list" ui-sref-active="active">List</a>&nbsp;&nbsp;&nbsp;
			
			<ui-view></ui-view>
			

		</div>	
	</div>	
@endsection