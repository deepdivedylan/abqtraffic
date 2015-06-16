app.controller("IndexController", ["$scope", "barricades", function($scope, barricades) {
	barricades.success(function(data) {
		$scope.barricades = data.features;
		$scope.barricades.forEach(function(barricade, index) {
			var detour = true;
			if(barricade.attributes.ALT_RTE === "TRAFFIC WILL RUN SMOOTHLY") {
				detour = false;
			}
			$scope.barricades[index].abqtraffic = {"detour": detour};
		});
	});
}]);