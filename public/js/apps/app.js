var app = angular.module('myApp',[]);

app.controller('ContactController',['$scope','$http',ContactController]);

function ContactController($scope,$http){
	$scope.contacts = [];

	$scope.contact = {};

	$scope.errors = {};

	$scope.editContact = function(contact){
		$scope.contact = contact;		
	};

	$scope.updateContact = function(){
		updateContact();
	};

	function loadContacts(){
		$http
			.get('contact')
			.then(function(response){
				$scope.contacts = response.data;				
			},function(error){
				console.log(error);
			});
	}

	function updateContact(){
		var id = $scope.contact.id;		
		$http
			.put('contact/' + id,$scope.contact)
			.then(function(response){
				$scope.contact = {};
				$scope.errors = {};
			},function(error){
				if(error.status == 422){
					$scope.errors = error.data;
				}				
			});
	}

	function init(){
		loadContacts();
	}

	init();
}