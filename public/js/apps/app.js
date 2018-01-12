var app = angular.module('myApp',[]);
	app.directive('contactDetail', function(){		
		return {				
			//template:'{{ contact.first_name }}',
			templateUrl:'js/apps/contacts/views/contactDetail.html'
		};
	});


	/*
		$('#id').attr('name','id');//ATTR VALUE
		$('#id').prop('checked',false);//BOOLEAN		
	*/