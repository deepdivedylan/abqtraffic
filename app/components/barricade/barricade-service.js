app.factory("barricades", ["$http", function($http) {
	return($http.get("app/components/barricade/barricade-proxy.php")
		.success(function(data) {
			return(data);
		})
		.error(function(data) {
		return(data);
	}));
}]);