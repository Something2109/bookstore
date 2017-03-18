var myApp = angular.module('myApp', ['angularUtils.directives.dirPagination']).constant('API','http://localhost/bookstore/public/');
function OtherController($scope) {}
myApp.controller('OtherController', OtherController);
myApp.controller('MyController',function($scope,$http,API){
  $http({
    method: 'GET',
    url: API + 'sale/list'
  }).then(function successCallback(response) {
    $scope.sales=response.data;
    // console.log(1);
    });
  $scope.currentPage = 1;
  $scope.pageSize = 10;
  $scope.sales = [];
});