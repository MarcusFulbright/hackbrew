app.controller("mainController", function($scope, $http){

    $scope.apiKey= '179b4ca157d29bca1a09a4e7e013f5f2';
    $scope.init = function() {
	var request = 'http://api.brewerydb.com/v2/beers/?key=' + $scope.apiKey;
	$http({method: 'GET', url: request}).
	success(function(data, status, headers, config) {
    // this callback will be called asynchronously
    // when the response is available
    }).
	error(function(data, status, headers, config) {
    // called asynchronously if an error occurs
    // or server returns response with an error status.
    });
	console.log(request);
    };
});
