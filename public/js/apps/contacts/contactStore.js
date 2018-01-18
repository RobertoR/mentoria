app.factory('ContactStore',ContactStore);

function ContactStore(){
	var store = this;

	var contact = {

	};

	store.setContact = function(contactData){
		contact = contactData;
	}

	store.getContact = function(){		
		return contact.hasOwnProperty('id')? contact : false;
	}

	return store;
}