angular.module("abqtrafficFilters", ["ngSanitize"]).filter("checkmark", function($sce) {
	return(function(input) {
		var checkmark = $sce.trustAsHtml("<i class=\"fa fa-check\"></i>");
		var xmark = $sce.trustAsHtml("<i class=\"fa fa-times\"></i>");
		return(input ? checkmark : xmark);
	});
});