var locationsApp = angular.module('locationsApp', ['ngRoute','datatables']);


locationsApp.filter('titlecase', function() {
    return function(input) {
        var smallWords = /^(a|an|and|as|at|but|by|en|for|if|in|nor|of|on|or|per|the|to|vs?\.?|via)$/i;

        input = input.toLowerCase();
        return input.replace(/[A-Za-z0-9\u00C0-\u00FF]+[^\s-]*/g, function(match, index, title) {
            if (index > 0 && index + match.length !== title.length &&
                match.search(smallWords) > -1 && title.charAt(index - 2) !== ":" &&
                (title.charAt(index + match.length) !== '-' || title.charAt(index - 1) === '-') &&
                title.charAt(index - 1).search(/[^\s-]/) < 0) {
                return match.toLowerCase();
        }
        if (match.substr(1).search(/[A-Z]|\../) > -1) {
            return match;
        }
        return match.charAt(0).toUpperCase() + match.substr(1);
    });
    }
});

locationsApp.config(function($sceProvider) {
    $sceProvider.enabled(false);
});

locationsApp.config(function($routeProvider) {
    $routeProvider
    .when('/', {
        templateUrl : 'views/home.html',
        controller : 'homeController'
    });
});

locationsApp.controller('homeController', function($scope,$http,$route,$window,$location,$timeout,$filter,$rootScope) 
{   
    console.log("in homeController");
    $scope.adminLoggedIn=localStorage.adminLoggedIn;
    console.log($scope.adminLoggedIn);
    $scope.test = function()
    {
        var param = JSON.stringify({
            "msg" : "from app.js"
        });

        $http.post("http://159.89.193.43:8888/test",param)
        .success(function (data) {
            console.log(data);
            if (data.success == "true") {                   
                iziToast.show({theme: 'dark',title:'Success',message: data.message,position: 'topRight',icon: 'fa fa-user',progressBarColor: 'rgb(0, 255, 184)'});
                location.reload();
            } else {
                iziToast.error({title: 'Error',message: data.message, position: 'topRight'});
            }
        })
        .error(function (err) {
            iziToast.error({title: 'Error',message: "Server Error !", position: 'topRight'});
        });

    };

    $scope.getAllLocations = function()
    {
        $http.post("http://159.89.193.43:8888/getlocation")
        .success(function (data) {
            console.log(data);
            if (data.success == "true") {
                $scope.locationList = data.locations;                  
                //iziToast.show({theme: 'dark',title:'Success',message: data.message,position: 'topRight',icon: 'fa fa-user',progressBarColor: 'rgb(0, 255, 184)'});
            } else {
                iziToast.error({title: 'Error',message: data.message, position: 'topRight'});
            }
        })
        .error(function (err) {
            iziToast.error({title: 'Error',message: "Server Error !", position: 'topRight'});
        });
    };

    $scope.getForEdit = function(id)
    {
        $scope.locDataEdit = $filter('filter')($scope.locationList, {'_id':id});
        $scope.locDataEdit=JSON.parse(angular.toJson($scope.locDataEdit))
        $scope.locDataEdit = $scope.locDataEdit[0];
    };

    $scope.getForView=function(id)
    {
        $scope.locDataView = $filter('filter')($scope.locationList, {'_id':id});
        $scope.locDataView=JSON.parse(angular.toJson($scope.locDataView))
        $scope.locDataView = $scope.locDataView[0];
    };

    $scope.getForDelete = function(id)
    {
        $scope.locDataDelete = $filter('filter')($scope.locationList, {'_id':id});
        $scope.locDataDelete=JSON.parse(angular.toJson($scope.locDataDelete))
        $scope.locDataDelete = $scope.locDataDelete[0];
    };

    $scope.saveEditedLocation = function(id)
    {
       delete $scope.locDataEdit._id;

        var param = JSON.stringify({
            "info" : $scope.locDataEdit,
            "id" :id
        });
        $http.post("http://159.89.193.43:8888/editrecord",param)
        .success(function (data) {
            console.log(data);
            if (data.success == "true") {                   
                iziToast.show({theme: 'dark',title:'Success',message: data.message,position: 'topRight',icon: 'fa fa-user',progressBarColor: 'rgb(0, 255, 184)'});
                location.reload();
            } else {
                iziToast.error({title: 'Error',message: data.message, position: 'topRight'});
            }
        })
        .error(function (err) {
            iziToast.error({title: 'Error',message: "Server Error !", position: 'topRight'});
        });
    };


    $scope.deleteLocation= function(id)
    {
        var param = JSON.stringify({
            "id" :id
        });
        $http.post("http://159.89.193.43:8888/deteterecord",param)
        .success(function (data) {
            console.log(data);
            if (data.success == "true") {                   
                iziToast.show({theme: 'dark',title:'Success',message: data.message,position: 'topRight',icon: 'fa fa-user',progressBarColor: 'rgb(0, 255, 184)'});
                location.reload();
            } else {
                iziToast.error({title: 'Error',message: data.message, position: 'topRight'});
            }
        })
        .error(function (err) {
            iziToast.error({title: 'Error',message: "Server Error !", position: 'topRight'});
        });
    };


    $scope.addNewLocation = function()
    {
        console.log($scope.addData);
        var param = JSON.stringify(
            $scope.addData
        );
        $http.post("http://159.89.193.43:8888/addrecord",param)
        .success(function (data) {
            console.log(data);
            if (data.success == "true") {                   
                iziToast.show({theme: 'dark',title:'Success',message: data.message,position: 'topRight',icon: 'fa fa-user',progressBarColor: 'rgb(0, 255, 184)'});
                location.reload();
            } else {
                iziToast.error({title: 'Error',message: data.message, position: 'topRight'});
            }
        })
        .error(function (err) {
            iziToast.error({title: 'Error',message: "Server Error !", position: 'topRight'});
        });
        
    };

    $scope.adminLogin = function()
    {
        var param = JSON.stringify({
            "username":$scope.username,
            "password":$scope.password
        });
        $http.post("http://159.89.193.43:8888/dologin",param)
        .success(function (data) {
            console.log(data);
            if (data.success == "true") {                   
                iziToast.show({theme: 'dark',title:'Success',message: data.message,position: 'topRight',icon: 'fa fa-user',progressBarColor: 'rgb(0, 255, 184)'});
                localStorage.adminLoggedIn = true;
                $scope.adminLoggedIn= localStorage.adminLoggedIn;
            } else {
                iziToast.error({title: 'Error',message: data.message, position: 'topRight'});
            }
        })
        .error(function (err) {
            iziToast.error({title: 'Error',message: "Server Error !", position: 'topRight'});
        });
    };

    $scope.logOutAdmin = function()
    {
        localStorage.removeItem('adminLoggedIn')
        //localStorage.adminLoggedIn = false;
        $scope.adminLoggedIn= localStorage.adminLoggedIn;
        location.reload();
    };
});


