app.controller('ContactController',['$scope','$http','$state','$stateParams','ContactStore','ContactService',ContactController]);

function ContactController($scope,$http,$state,$stateParams,ContactStore,ContactService){
	$scope.$state = $state;

	$scope.contacts = [];

	$scope.contact = {};

	$scope.errors = {};

	$scope.editContact = function(contact){
		$scope.contact = angular.copy(contact);	
		ContactStore.setContact($scope.contact);		
		$state.go('edit',{id:contact.id});
	};

	$scope.updateContact = function(contactForm){
		if(contactForm.$invalid || !$scope.contact.hasOwnProperty('id'))
			return ;

		ContactService.updateContact($scope.contact)
			.then(function(response){
				$scope.contact = {};
				$scope.errors = {};
				ContactStore.setContact($scope.contact);
				$state.go('list');
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

	function loadContact(id){
		var contactData = ContactStore.getContact();
		if(contactData){
			$scope.contact = contactData;
		}else{
			ContactService.loadContact(id)
				.then(function(response){				
					$scope.contact = response;
				},function(errors){
					console.log(errors);
				});
		}
	}

	function init(){
		if($state.current.name == 'list'){
			loadContacts();
		}
		if($state.current.name == 'edit' && $stateParams.hasOwnProperty('id')){
			loadContact($stateParams.id);
		}		
	}

	init();
}