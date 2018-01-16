app.config(function($stateProvider) {  
  $stateProvider.state({
    name:'list',
    url:'/',
    templateUrl:'js/apps/contacts/components/list/list.html', 
    controller:'ContactController'   
  });  
  $stateProvider.state({
    name:'edit',
    url:'/edit/{id}',
    templateUrl:'js/apps/contacts/components/form/form.html', 
    controller:'ContactController'   
  });  
});