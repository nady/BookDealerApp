angular.module('bookApp.controllers',[])
.controller('BookListController',function($scope,$state,popupService,$window,$stateParams,Book,$http){

    $scope.books=Book.query();
	//added features
	$scope.sold = {};
	$scope.booked = {};
	$scope.discounts = {Blue: true, Orange: true};
	$scope.roundedValue = {}
	$scope.avgPrice = {}
    $scope.deleteBook=function(book){
        if(popupService.showPopup('Really delete this?')){
            book.$delete(function(){
                $window.location.href='';
            });
        }
    }
    $scope.book=Book.get({id:$stateParams.id});
    $scope.statusBookedChange = function(book){
        if(popupService.showPopup('Really book this?')){
            book.$update(function(){
            alert("Done");
            });
        }
    }

}).controller('BookViewController',function($scope,$stateParams,Book){
    $scope.book=Book.get({id:$stateParams.id});
}).controller('BookCreateController',function($scope,$state,$stateParams,Book){

    $scope.book=new Book();

    $scope.addBook=function(){
        $scope.book.$save(function(){
            $state.go('books');
        });
    }

}).controller('BookEditController',function($scope,$state,$stateParams,Book){

    $scope.updateBook=function(){
        $scope.book.$update(function(){
            $state.go('books');
        });
    };

    $scope.loadBook=function(){
        $scope.book=Book.get({id:$stateParams.id});
    };

    $scope.loadBook();
})
    .controller('MagazineListController',function($scope,$state,popupService,$window,$filter, Magazine, Status){
        $scope.magazine=new Magazine();
        $scope.statusUpdate = new Status();
        $scope.magazines=Magazine.query();
        //added features as buttons
        //$scope.showSelected = $filter('filter')($scope.magazines , { $: true });
        $scope.selectedList ={};
        $scope.sold = {};
        $scope.booked = {};
        $scope.discounts = {Blue: true, Orange: true};
        $scope.roundedValue = {}
        $scope.avgPrice = {}
        $scope.changeToSold = function(magazine){
            if(popupService.showPopup('Update Values ?')){
                $scope.updateBook=function(){
                    $scope.magazine.$update(function(){
                        $state.go('magazines');
                    });
                };
            }
        }
        $scope.deleteMagazine=function(magazine){
            if(popupService.showPopup('Really delete this?')){
                magazine.$delete(function(){
                    $window.location.href='';
                });
            }
        }

    })
    .controller('MagazineViewController',function($scope,$stateParams,Magazine){

        $scope.magazine=Magazine.get({id:$stateParams.id});
        //alert($scope.magazine);

    }).controller('MagazineCreateController',function($scope,$state,$stateParams,Magazine){

    $scope.magazine=new Magazine();
    $scope.addBook=function(){
        $scope.magazine.$save(function(){
            $state.go('magazines');
        });
    }

}).controller('MagazineEditController',function($scope,$state,$stateParams,Magazine){
    $scope.updateBook=function(){
        $scope.magazine.$update(function(){
            $state.go('books');
        });
    };

    $scope.loadBook=function(){
        $scope.magazine=Magazine.get({id:$stateParams.id});
    };
})
