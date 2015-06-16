var app = angular.module("AbqTraffic", ["ngRoute"]);

app.config(function($routeProvider) {
	$routeProvider
		.when("/", {
			controller: "IndexController",
			templateUrl: "/~dmcdonald21/abqtraffic/app/components/index/index-view.php"
		})
		.when("/barricade/:id", {
			controller: "BarricadeController",
			templateUrl: "/~dmcdonald21/abqtraffic/app/components/barricade/barricade-view.php"
		})
		.otherwise({
			redirectTo: "/"
		});
});