app.controller('ContactController',['$scope','$http','$state','$stateParams','ContactService',ContactController]);

function ContactController($scope,$http,$state,$stateParams,ContactService){
	$scope.$state = $state;

	$scope.contacts = [];

	$scope.contact = {};

	$scope.errors = {};

	$scope.editContact = function(contact){
		$scope.contact = angular.copy(contact);			
		$state.go('edit',{id:contact.id});
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
		if($state.current.name == 'list'){
			loadContacts();
		}
		console.log($stateParams.id); 
	}

	init();
}