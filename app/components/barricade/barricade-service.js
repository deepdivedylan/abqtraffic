app.factory("barricades", ["$http", function($http) {
	return($http.get("http://coagisweb.cabq.gov/arcgis/rest/services/public/trafficbarricades/MapServer/1/query?where=1+%3D+1&text=&objectIds=&time=&geometry=&geometryType=esriGeometryEnvelope&inSR=&spatialRel=esriSpatialRelIntersects&relationParam=&outFields=*&returnGeometry=true&maxAllowableOffset=&geometryPrecision=&outSR=4326&returnIdsOnly=false&returnCountOnly=false&orderByFields=&groupByFieldsForStatistics=&outStatistics=&returnZ=true&returnM=true&gdbVersion=&returnDistinctValues=false&f=pjson")
		.success(function(data) {
			return(data);
		})
		.error(function(data) {
		return(data);
	}));
}]);