angular.module('myApp.services', [])


    .factory('Book', function($resource) {
    return $resource('http://localhost:8080/backend/api/book/:id', { id: '@_id' }, {
        update: {
            method: 'PUT'
        }
    });
});
.service('popupService',function($window){
    this.showPopup=function(message){
        return $window.confirm(message);
    }
})