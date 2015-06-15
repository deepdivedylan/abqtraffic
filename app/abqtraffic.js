var app = angular.module("AbqTraffic", ["ngRoute"]);

app.config(function($routeProvider) {
	$routeProvider
		.when("/", {
			controller: "IndexController",
			templateUrl: "views/index.php"
		})
		.when("/barricade/:id", {
			controller: "BarricadeController",
			templateUrl: "views/barricade.php"
		})
		.otherwise({
			redirectTo: "/"
		});
});