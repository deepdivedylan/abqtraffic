app.controller("BarricadeController", ["$scope", "barricades", "$routeParams", function($scope, barricades, $routeParams) {
	barricades.success(function(data) {
		$scope.detail = data[$routeParams.id];
	});
}]);