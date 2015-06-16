var app = angular.module("AbqTraffic", ["ngRoute", "ngSanitize", "abqtrafficFilters"]);

app.config(function($routeProvider) {
	$routeProvider
		.when("/", {
			controller: "IndexController",
			templateUrl: "app/components/index/index-view.php"
		})
		.when("/barricade/:id", {
			controller: "BarricadeController",
			templateUrl: "app/components/barricade/barricade-view.php"
		})
		.otherwise({
			redirectTo: "/"
		});
});