angular.module('bookApp.services',[])
.factory('Dealer',function($resource){
    return $resource('http://localhost:8000/app_dev.php/backend/api/dealers/:id',{id:'@id'},{
        update: {
            method: 'PUT'
        },
        save : { // redefine save action defaults
            method : 'POST',
            transformRequest: function(data, headers){
                console.log(headers);
                headers = angular.extend({}, headers, {'Content-Type': 'application/json'});
                console.log(headers);
                console.log(data);
                console.log(angular.toJson(data));
                return angular.toJson(data); // this will go in the body request
            }
        }
		
    });
})
.factory('Book',function($resource,$http){
    $http.defaults.useXDomain = true;
    return $resource('http://localhost:8000/app_dev.php/backend/api/books/:id',{id:'@id'},{
        update: {
            method: 'PUT'
        },
       
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
    return $resource('http://localhost:8000/backend/api/books/statusChange:id',{id:'@id'},{
	update: {
            method: 'PUT'
        },
    save : { // redefine save action defaults
        method : 'POST',
        transformRequest: function(data, headers){
            console.log(headers);
            headers = angular.extend({}, headers, {'Content-Type': 'application/json'});
            console.log(headers);
            console.log(data);
            console.log(angular.toJson(data));
            return angular.toJson(data); // this will go in the body request
        }
    }
  });
	
});