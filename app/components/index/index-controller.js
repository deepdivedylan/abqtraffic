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

	$scope.coordinates = null;
	$scope.showStatus = false;
	$scope.statusType = "alert-danger";
	$scope.origin = false;
	$scope.destination = false;

	$scope.disableStatus = function() {
		$scope.showStatus = false;
	};

	$scope.useOrigin = function() {
		if($scope.destination === true) {
			$scope.statusType = "alert-warning";
			$scope.statusContent = "Destination and origin cannot be used simultaneously";
			$scope.showStatus = true;
			$("#gpsOrigin").prop("checked", false);
			return;
		}

		if($scope.origin === false) {
			$scope.origin = true;
			if($scope.coordinates === null) {
				$scope.getCoordinates();
			} else {
				$scope.loadFormCoordinates("Origin");
			}
		} else {
			$scope.origin = false;
		}
	};

	$scope.loadFormCoordinates = function(type) {
		var latitude = "#gps" + type + "-latitude";
		var longitude = "#gps" + type + "-longitude";
		$(latitude).val($scope.coordinates[0]);
		$(longitude).val($scope.coordinates[1]);
	};

	$scope.useDestination = function() {
		if($scope.origin === true) {
			$scope.statusType = "alert-warning";
			$scope.statusContent = "Destination and origin cannot be used simultaneously";
			$scope.showStatus = true;
			$("#gpsDestination").prop("checked", false);
			return;
		}

		if($scope.destination === false) {
			$scope.destination = true;
			if($scope.coordinates === null) {
				$scope.getCoordinates();
			} else {
				$scope.loadFormCoordinates("Destination");
			}
		} else {
			$scope.destination = false;
		}
	};

	$scope.getCoordinates = function() {
		if($scope.coordinates !== null) {
			return;
		}

		if(!navigator.geolocation) {
			$scope.statusType = "alert-warning";
			$scope.statusContent = "Your browser does not support location";
			$scope.showStatus = true;
			return;
		}

		function success(position) {
			var latitude = position.coords.latitude;
			var longitude = position.coords.longitude;

			$scope.$apply(function() {
				$scope.coordinates = [latitude, longitude];
				$scope.statusType = "alert-success";
				$scope.statusContent = "Location successfully loaded";
				$scope.showStatus = true;
				if($scope.origin === true) {
					$scope.loadFormCoordinates("Origin");
				} else if($scope.destination === true) {
					$scope.loadFormCoordinates("Destination");
				}
			});
		};

		function error() {
			$scope.$apply(function() {
				$scope.statusType = "alert-error";
				$scope.statusContent = "Unable to retrieve location";
				$scope.showStatus = true;
				$scope.origin = false;
				$scope.destination = false;
			});
		};

		$scope.statusType = "alert-info";
		$scope.statusContent = "Locating...";
		$scope.showStatus = true;

		navigator.geolocation.getCurrentPosition(success, error);
	};

	$scope.detourFilter = function() {
		var checked = $scope.detourOnly;
		if(checked === false) {
			$scope.detourOnly = undefined;
		}
	};
}]);