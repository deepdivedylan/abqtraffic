angular.module("abqtrafficFilters", ["ngSanitize"]).filter("checkmark", function($sce) {
	return(function(input) {
		var checkmark = $sce.trustAsHtml("<i class=\"glyphicon glyphicon-ok\"></i>");
		var xmark = $sce.trustAsHtml("<i class=\"glyphicon glyphicon-remove\"></i>");
		return(input ? checkmark : xmark);
	});
});