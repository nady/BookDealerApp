
// define application
angular.module('learnshipApp',  ['ui.router', 'ngResource', 'myApp.controllers', 'myApp.services']);

// Some APIs expect a PUT request in the format URL/object/ID
// Here we are creating an 'update' method
angular.module('myApp.controllers',[]);
angular.module('learnshipApp').config(function($stateProvider) {
    $stateProvider.state('books', { // state for showing all movies
        url: '/',
        //templateUrl: 'partials/books.html',
        controller: 'BookController'
    }).state('viewBook', { //state for showing single movie
        url: '/book/:id/view',
        templateUrl: 'partials/book-view.html',
        controller: 'BookViewController'
    }).state('newBook', { //state for adding a new movie
        url: '/book/new',
        templateUrl: 'partials/book-add.html',
        controller: 'BookCreateController'
    }).state('editBook', { //state for updating a movie
        url: '/book/:id/edit',
        templateUrl: 'partials/book-edit.html',
        controller: 'BookEditController'
    });
}).run(function($state) {
    $state.go('books'); //make a transition to movies state when app starts
});
function BaseCtrl($rootScope) {
    $rootScope.spinner = false;
}