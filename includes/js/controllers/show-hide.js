app.controller("show-hide", function($scope) {
	$scope.myVar = false;
	$scope.toggle = function() {
		$scope.myVar = !$scope.myVar;
	};
});