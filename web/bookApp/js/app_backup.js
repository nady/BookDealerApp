angular.module('bookApp',['ui.router','ngResource','bookApp.controllers','bookApp.services']);

angular.module('bookApp').config(function($stateProvider,$httpProvider){
 $stateProvider.state('dealers',{
        url:'/dealers',
        templateUrl:'bookApp/partials/dealers.html',
        controller:'DealerListController'
    }).state('viewDealer',{
        url:'dealers/:id/view',
        templateUrl:'bookApp/partials/dealer-view.html',
        controller:'DealerViewController'
    }).state('books',{
        url:'/books',
        templateUrl:'bookApp/partials/books.html',
        controller:'BookListController'
    }).state('viewBook',{
       url:'books/:id/view',
       templateUrl:'bookApp/partials/book-view.html',
       controller:'BookViewController'
    }).state('newBook',{
        url:'/books/new',
        templateUrl:'bookApp/partials/book-add.html',
        controller:'BookCreateController'
    }).state('editBook',{
        url:'/books/:id/edit',
        templateUrl:'bookApp/partials/book-edit.html',
        controller:'BookEditController'
    }).state('magazines',{
       url:'/magazines/',
       templateUrl:'bookApp/partials/magazines.html',
       controller:'MagazineListController'
    }).state('viewMagazine',{
       url:'magazines/:id/view',
       templateUrl:'bookApp/partials/magazine-view.html',
       controller:'MagazineViewController'
    }).state('newMagazine',{
        url:'/magazines/new',
        templateUrl:'bookApp/partials/magazine-add.html',
        controller:'MagazineCreateController'
    }).state('editMagazine',{
        url:'/magazines/:id/edit',
        templateUrl:'bookApp/partials/magazine-edit.html',
        controller:'MagazineEditController'
    });
}).run(function($state){
   $state.go('books');
});