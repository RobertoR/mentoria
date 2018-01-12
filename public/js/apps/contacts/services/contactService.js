app.factory('ContactService',ContactService);

ContactService.$inject = ['$http','$q'];

function ContactService($http,$q){
	var service = this;

	service.apiUrl = '';

	service.setApiUrl  = function(apiUrl){

	}


	service.loadContacts = function(){
		var deferred = $q.defer();
		$http
			.get('contact')
			.then(function(response){
				deferred.resolve(response.data);
			},function(error){
				deferred.reject(error);
			});
		return deferred.promise;
	}

	service.updateContact = function(contact){
		var deferred = $q.defer();		
		$http
			.put('contact/' + contact.id,contact)
			.then(function(response){
				deferred.resolve(response.data);
			},function(error){
				deferred.reject(error);
			});
		return deferred.promise;
	}

	return service;
}