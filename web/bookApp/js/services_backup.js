angular.module('bookApp.services',[])
.config(['$httpProvider', function($httpProvider) {

    $httpProvider.defaults.useXDomain = true;
    delete $httpProvider.defaults.headers.common['X-Requested-With'];
}]);


.factory('Dealer',function($resource){
    return $resource('http://localhost:8000/backend/api/dealers/:id',{id:'@id'},{
        update: {
            method: 'PUT'
        }
		
    });
})

.factory('Book',function($resource){
    return $resource('http://localhost:8000/backend/api/books/:id',{id:'@id'},{
        update: {
            method: 'PUT'
        }
		
    });
	
})
.service('popupService',function($window){
    this.showPopup=function(message){
        return $window.confirm(message);
    }
})
.factory('Magazine',function($resource){
    return $resource('http://localhost:8000/backend/api/magazines/:id',{id:'@id'},{
	    //alert("here");
        update: {
            method: 'PUT'
        }
		
    });
})
.factory('Status', function($resource) {
    return $resource('http://localhost:8000/backend/api/magazines/status/',{
	update: {
            method: 'PUT'
        }
  });
	
});