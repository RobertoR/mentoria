@extends('layouts.app')

@section('content')
<div ng-app="myApp" class="container">
	<div ng-controller="ContactController">
		<form >

			<ul>				
				<li ng-repeat="error in errors">@{{ error }}</li>				
			</ul>
		<!--Reutilizacion de templates basicos y envio de argumentos-->
	    @component('components.input_field',[
	    	'id' => 'first_name',
	    	'label' => 'First name',
	    	'name' => 'first_name',    	
	    	'value' => '',    	
	    	'ngModel' => 'contact.first_name',
	    ])
	    @endcomponent

		<button ng-click = "updateContact()">Guardar</button>
	</form>	
		<table border="1">
			<thead>
				<tr>
					<th>First Name</th>
					<th>Last Name Name</th>
				</tr>
			</thead>
			<tbody>			
				<tr ng-repeat="contact in contacts" ng-click="editContact(contact)">
					<td>@{{ contact.first_name }}</td>
					<td>@{{ contact.last_name }}</td>
					<td>
						<ul>						
							<li ng-repeat="phone in contact.phones">
								@{{ phone.number }}
							</li>						
						</ul>
					</td>
				</tr>			
			</thead>
		</table>
	</div>	
</div>
@endsection