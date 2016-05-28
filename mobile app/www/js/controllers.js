angular.module('starter.controllers', ['angular-md5'])

.factory('Authorization', function() {

  authorization = {};
  authorization.ID = '';
  return authorization;
})

.controller('AppCtrl', function($scope, $ionicModal, $timeout) {

})

.controller('HomeCtrl', function($scope, $http, Authorization) {
  $http.get('http://localhost:3000/api/table')
    .success(function(response) {
      $scope.tables = response['Tables'];
    });
    $scope.userToken = Authorization;
    console.log($scope.userToken.ID);
})

.controller('LoginCtrl', function($scope, $http, $ionicPopup, $location, md5, Authorization) {
  $scope.user = {};
  $scope.login = function() {
    $http.get('http://localhost:3000/api/customer/'+$scope.user.uname)
      .then(function(response) {
        var custEmail = response.data['Customer'][0].custEmail;
        var custPass = response.data['Customer'][0].custPassword;

        // check if user credentials are correct
        if($scope.user.uname == custEmail && md5.createHash($scope.user.password) == custPass) {
          // set user token after login
          $scope.userToken = Authorization;
          $scope.userToken.ID = response.data['Customer'][0].custID;

          $location.path("/app/home"); //redirect to home page

        } else {
          var alertPopup = $ionicPopup.alert({
              title: 'Login failed!',
              template: 'Please check your credentials!'
          });
        }
      })
  }
})

.controller('LogoutCtrl', function($scope, $http, $location, Authorization) {
  $scope.userToken = Authorization;
  $scope.userToken.ID = '';
  $location.path('/start');
})

.controller('SignupCtrl', function($scope, $http, $ionicPopup, $location, $httpParamSerializerJQLike) {
  $scope.user = {};
  $scope.signup = function() {
    $http({
        method: 'POST',
        url: 'http://localhost:3000/api/customer/',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        data: $httpParamSerializerJQLike({name: $scope.user.uname, email: $scope.user.email, password: $scope.user.password})
    }).then(function() {
      var alertPopup = $ionicPopup.alert({
          title: 'Signup success!',
          template: 'Please login now!'
      });
      $location.path('/start');
    });
  }
})

.controller('TableCtrl', function($scope, $http, $httpParamSerializerJQLike, $ionicPopup, $stateParams, Authorization) {
  var id = $stateParams.tableId;
  $http.get('http://localhost:3000/api/table/'+id)
    .success(function(response) {
      $scope.tables = response['Tables'][0];
    });
  $scope.userToken = Authorization;
  $scope.date = {};
  $scope.book = function() {
    var formatDate = new Date($scope.date.timeValue);
    var formatTime = formatDate.getHours()+':'+formatDate.getMinutes()+':'+formatDate.getSeconds();

    $http({
        method: 'POST',
        url: 'http://localhost:3000/api/reservation/',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        data: $httpParamSerializerJQLike({custID: $scope.userToken.ID, tableID: id, date: $scope.date.dateValue, time: formatTime})
    }).then(function() {
      var alertPopup = $ionicPopup.alert({
          title: 'Reservation Success!',
          template: 'Your table has been reserved!'
      });
    });
  };

})

.controller('ReservationsCtrl', function($scope, $http, $location, $window, Authorization) {
  $scope.userToken = Authorization;

  $http.get('http://localhost:3000/api/reservation/'+ $scope.userToken.ID)
    .success(function(response) {
      $scope.tables = response['Reservations'];
      $scope.tables.forEach(function(ele, index) {
        $http.get('http://localhost:3000/api/table/'+ $scope.tables[index].tableID_FK)
          .success(function(response) {
            $scope.tables[index].tableType = response['Tables'][0].tableType;
          });
      })
    });

    $scope.deleteItem = function(val) {
      $http.delete('http://localhost:3000/api/reservation/'+val)
        .then(function() {
          $window.location.reload(true);
        })
    }
})

.controller('StartCtrl', function($scope, $state) {
  $scope.go = function (path) {
    $state.go(path);
  };
});
