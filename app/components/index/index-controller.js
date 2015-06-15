app.controller("IndexController", ["$scope", "barricades", function($scope, barricades) {
	barricades.success(function(data) {
		$scope.barricades = data;
	});
}]);