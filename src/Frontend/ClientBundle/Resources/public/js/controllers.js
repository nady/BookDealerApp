angular.module('myApp.controllers', []).controller('BookController', function($scope, $state, popupService, $window, Book) {
    $scope.books = Book.query(); //fetch all books. Issues a GET to /api/books

    $scope.deleteBook = function(book) { // Delete a book. Issues a DELETE to /api/books/:id
        if (popupService.showPopup('Really delete this?')) {
            book.$delete(function() {
                $window.location.href = ''; //redirect to home
            });
        }
    };
}).controller('BookViewController', function($scope, $stateParams, Book) {
    $scope.book = Book.get({ id: $stateParams.id }); //Get a single book.Issues a GET to /api/books/:id
}).controller('BookCreateController', function($scope, $state, $stateParams, Book) {
    $scope.book = new Book();  //create new book instance. Properties will be set via ng-model on UI

    $scope.addBook = function() { //create a new book. Issues a POST to /api/books
        $scope.book.$save(function() {
            $state.go('books'); // on success go back to home i.e. books state.
        });
    };
}).controller('BookEditController', function($scope, $state, $stateParams, Book) {
    $scope.updateBook = function() { //Update the edited book. Issues a PUT to /api/books/:id
        $scope.book.$update(function() {
            $state.go('books'); // on success go back to home i.e. books state.
        });
    };

    $scope.loadBook = function() { //Issues a GET request to /api/books/:id to get a book to update
        $scope.book = Book.get({ id: $stateParams.id });
    };

    $scope.loadBook(); // Load a book which can be edited on UI
});