app.controller('ContactController',['$scope','$http','ContactService',ContactController]);

function ContactController($scope,$http,ContactService){
	$scope.contacts = [];

	$scope.contact = {};

	$scope.errors = {};

	$scope.editContact = function(contact){
		$scope.contact = angular.copy(contact);		
	};

	$scope.updateContact = function(contactForm){
		if(contactForm.$invalid || !$scope.contact.hasOwnProperty('id'))
			return ;

		ContactService.updateContact($scope.contact)
			.then(function(response){
				$scope.contact = {};
				$scope.errors = {};
			},function(errors){
				console.log(errors);
			});
	};

	function loadContacts(){		
		ContactService.loadContacts()
			.then(function(response){
				$scope.contacts = response;
			},function(errors){
				console.log(errors);
			});

	}


	function init(){
		loadContacts();
	}

	init();
}